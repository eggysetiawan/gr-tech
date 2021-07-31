<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;
use App\Events\EmployeeCreated;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Client\Request as ClientRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
        $employees = Employee::all();
        return $dataTable->render('employees.index', compact('employees'));
    }

    public function filter(EmployeeDataTable $dataTable)
    {
        $filter = [
            'from' => request('from') ?? null,
            'to' => request('to') ?? null,
            'first_name' => request('first_name') ?? null,
            'last_name' => request('last_name') ?? null,
            'email' => request('email') ?? null,
            'company' => request('company') ?? null,
        ];

        $employees = Employee::all();
        return $dataTable->with($filter)->render('employees.index', compact('employees'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create', [
            'employee' => new Employee(),
            'companies' => Company::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $attr = $request->validated();
        $attr['company_id'] = $request->company;
        $employees = Employee::create($attr);

        event(new EmployeeCreated($employees));

        session()->flash('success', __('Employee has been created.'));
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->with('employees');
        return view('companies.show', [
            'company' => $company,
            'employeeCount' => $company->employees()->count(),
            'menu' => 'employees',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $attr = $request->validated();
        $attr['company_id'] = $request->company;
        $employee->update($attr);
        session()->flash('success', __('Employee has been updated.'));
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        session()->flash('success', __('Employee has been deleted.'));
        return redirect('employees');
    }
}
