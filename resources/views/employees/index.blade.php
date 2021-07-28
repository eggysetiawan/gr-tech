@extends('layouts.app',[
'page' => 'Employees',
'title' => 'Employees'
])

@section('breadcrumb')
    <li class="breadcrumb-item active">Employees</li>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-4">{{ __('Add Employee') }}</a>
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
