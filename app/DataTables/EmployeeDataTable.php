<?php

namespace App\DataTables;

use App\Models\Company;
use App\Models\Employee;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('action', function (Employee $employee) {
                return view('employees.partials.action', [
                    'employee' => $employee,
                    'companies' => Company::pluck('name', 'id')
                ]);
            })
            ->editColumn('name', function (Employee $employee) {
                return $employee->fullname();
            })
            ->editColumn('companyname', function (Employee $employee) {
                return view('employees.partials.company', compact('employee'));
            })
            ->rawColumns(['action', 'logo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery()
            ->with(['company'])
            ->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('employee-table')
            ->minifiedAjax()
            ->parameters([
                'stateSave' => true,
                'dom'          => "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>rtip",
                'buttons'      => ['reload', 'reset'],
                'order'   => [0, 'desc'],
                'lengthMenu' => [
                    [10, 25, 50, 100],
                    ['10', '25', '50', '100']
                ],
                'processing' => false,
            ])
            ->columns($this->getColumns());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // No.
            Column::make('DT_RowIndex')
                ->title('No.')
                ->orderable(false)
                ->searchable(false),

            // action
            Column::computed('action')
                ->title(__('Action'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->width(50)
                ->addClass('text-center'),

            Column::make('name')
                ->searchable(false)
                ->orderable(false)
                ->title(__('Full Name')),


            Column::computed('companyname')
                ->title(__('Company')),

            Column::make('email')
                ->title(__('Email')),

            Column::make('phone')
                ->title(__('Phone'))
                ->orderable(false),

            // invisible
            Column::make('first_name')
                ->visible(false)
                ->title(__('First Name')),

            Column::make('last_name')
                ->visible(false)
                ->title(__('Last Name')),

            Column::make('company.name')
                ->visible(false)
                ->title(__('Company Name')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}
