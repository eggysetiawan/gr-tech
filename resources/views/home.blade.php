@extends('layouts.app',[
'page' => 'Dashboard',
'title' => 'Dashboard'
])

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            Welcome to Dashboard.
            <!-- /.card -->
        </div>
    </div>
@endsection
