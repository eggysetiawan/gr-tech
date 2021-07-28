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
