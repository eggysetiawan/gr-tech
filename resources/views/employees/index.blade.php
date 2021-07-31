@extends('layouts.app',[
'page' => 'Employees',
'title' => 'Employees'
])

@section('breadcrumb')
    <li class="breadcrumb-item active">Employees</li>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <span class="h3">Search by</span>
    </div>
    <form action="{{ route('employees.filter') }}" method="get">
        <div class="d-flex justify-content-center mb-3">
            <div class="col-md-6">
                <label for="from">{{ __('From') }}</label>
                <input type="date" name="from" id="from" class="form-control"">
                    </div>
                    <div class=" col-md-6">
                <label for="to">{{ _('To') }}</label>
                <input type="date" name="to" id="to" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-center mb-3">
            <div class="col-md-3">
                <select name="first_name" id="first_name" class="form-control select2">
                    <option selected disabled>{{ __('Search first name...') }}</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->first_name }}">{{ $employee->first_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="last_name" id="last_name" class="form-control select2">
                    <option selected disabled>{{ __('Search last name...') }}</option>

                    @foreach ($employees as $employee)
                        <option value="{{ $employee->last_name }}">{{ $employee->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="email" id="email" class="form-control select2-email">
                    <option selected disabled>{{ __('Search email...') }}</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->email }}">{{ $employee->email }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="company" id="company" class="form-control select2-company">
                    <option selected disabled>{{ __('Search company...') }}</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->company_id }}">{{ $employee->company->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-12">
                <button type="submit" class="btn btn-block btn-primary mb-4">Filter</button>
            </div>
        </div>
    </form>


    <div class="d-flex justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('employees.create') }}" class="btn bg-orange mb-4">{{ __('Add Employee') }}</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $tableHeader ?? 'Employees Table' }}</h3>


                </div>

                <div class="card-body table-responsive ">
                    {!! $dataTable->table([
    'class' => 'table table-centered table-striped dt-responsive
        nowrap w-100',
    'id' => 'employee-table',
]) !!}
                </div>
                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>



@endsection

@push('script')
    {!! $dataTable->scripts() !!}
    @if ($errors->any())
        @foreach ($errors->all() as $messages)
            @php
                $message[] = $messages;
            @endphp
        @endforeach

        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to update!',
                    text: '{!! join('-<br>', $message) !!}',
                });
            });
        </script>

    @endif
@endpush
