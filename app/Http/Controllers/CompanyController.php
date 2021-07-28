<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTable $dataTable)
    {
        return $dataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create', [
            'company' => new Company(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $attr = $request->validated();
        $attr['slug'] =  Str::slug($request->name);
        $companies = Company::create($attr);

        if ($request->has('img')) {
            $companies->addMediaFromRequest('img')
                ->toMediaCollection('company-logo');
        }

        session()->flash('success', __('Company has been created.'));
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company->load('employees');
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        if ($request->has('img')) {
            if (!$company->getFirstMediaUrl('company-logo')) {
                $company->addMediaFromRequest('img')
                    ->toMediaCollection('company-logo');
            } else {
                $company->media()->delete();
                $company->addMediaFromRequest('img')
                    ->toMediaCollection('company-logo');
            }
        }

        session()->flash('success', __('Company has been updated'));
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        $company->media()->delete();
        session()->flash('success', __('Company has been deleted.'));
        return redirect('companies');
    }
}
