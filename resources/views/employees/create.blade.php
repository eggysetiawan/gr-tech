@extends('layouts.app',[
'page' => 'Create Employee',
'title' => 'Create Employee'
])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <x-alert />
    <div class="row">
        <div class="col-md-10">
            <div class="card">

                <form action="{{ route('employees.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('employees.partials._form-control')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
