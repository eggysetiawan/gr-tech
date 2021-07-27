@extends('layouts.app',[
'page' => 'Create Company',
'title' => 'Create Company'
])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Companies</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">

                <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('companies.partials._form-control')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
