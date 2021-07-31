@extends('layouts.app',[
'page' => 'Companies',
'title' => 'Companies'
])

@section('breadcrumb')
    <li class="breadcrumb-item active">Companies</li>
@endsection

@section('content')


    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('companies.create') }}" class="btn bg-orange mb-4">{{ __('Add Company') }}</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $tableHeader ?? 'Companies Table' }}</h3>


                </div>

                <div class="card-body table-responsive ">
                    {!! $dataTable->table([
    'class' => 'table table-centered table-striped dt-responsive
            nowrap w-100',
    'id' => 'company-table',
]) !!}
                </div>
                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection
