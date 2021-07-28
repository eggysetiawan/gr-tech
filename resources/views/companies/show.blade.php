@extends('layouts.app',[
'page' => $company->name,
'title' => $company->name
])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route($menu . '.index') }}">{{ ucfirst($menu) }}</a></li>
    <li class="breadcrumb-item active">{{ $company->name }}</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 mr-4">
                <img src="{{ $company->getFirstMediaUrl('company-logo') }}" class="img-fluid w-100"
                    alt="{{ $company->slug }} Logo">
            </div>

            <div class="col-md-7">
                <dl class="row">
                    <dt class="col-sm-3">{{ __('Name') }}</dt>
                    <dd class="col-sm-9">{{ $company->name }}</dd>

                    <dt class="col-sm-3">{{ __('Email') }}</dt>
                    <dd class="col-sm-9">{{ $company->email }}</dd>

                    <dt class="col-sm-3">{{ __('Website') }}</dt>
                    <dd class="col-sm-9">{{ $company->website }}</dd>

                    <dt class="col-sm-3">{{ __('Total Employee') }}</dt>
                    <dd class="col-sm-9">{{ $employeeCount }}</dd>
                </dl>
            </div>

        </div>
    </div>
@endsection
