<x-dropdown>
    <a href="{{ route('companies.show', $company->slug) }}" class="dropdown-item"
        title="{{ __('Company detail.') }}"><i class="far fa-eye nav-icon"></i>
        {{ __('Detail') }}
    </a>
    {{-- <a href="{{ route('companies.edit', $company->slug) }}" class="dropdown-item"
        title="{{ __('Edit Company.') }}"><i class="fas fa-edit nav-icon"></i>
        {{ __('Edit') }}
    </a> --}}
    <button type="button" class="dropdown-item" title="{{ __('Edit Company.') }}" data-toggle="modal"
        data-target="#{{ $company->slug }}">
        <i class="fas fa-edit nav-icon"></i>
        {{ __('Edit') }}
    </button>


    <form action="{{ route('companies.destroy', $company->slug) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="dropdown-item" title="{{ __('Delete Company.') }}" type="submit"
            onclick="return confirm('Are you sure want to delete this company?')">
            <i class="fas fa-trash nav-icon"></i>
            {{ __('Delete') }}
        </button>
    </form>


    <!-- Button trigger modal -->


</x-dropdown>

<!-- Modal Edit -->
<div class="modal fade" id="{{ $company->slug }}" tabindex="-1" aria-labelledby="{{ $company->slug }}Label"
    aria-hidden="true">
    <div class="modal-dialog ">
        <form action="{{ route('companies.update', $company->slug) }}" method="post" class="d-inline"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $company->slug }}Label">Edit {{ $company->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @csrf
                @method('patch')
                <div class="modal-body text-left">
                    @include('companies.partials._form-control')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Company</button>
                </div>
        </form>
    </div>
</div>


@push('script')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Pin yang anda masukkan salah!',
                    text: 'Silahkan coba lagi.',
                });


            });
        </script>

    @endif
@endpush
