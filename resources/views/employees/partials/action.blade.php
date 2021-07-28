<x-dropdown>
    <a href="{{ route('employees.show', $employee->id) }}" class="dropdown-item"
        title="{{ __('Company detail.') }}"><i class="far fa-eye nav-icon"></i>
        {{ __('Detail') }}
    </a>


    <button type="button" class="dropdown-item" title="{{ __('Edit Employee.') }}" data-toggle="modal"
        data-target="#employee-{{ $employee->id }}">
        <i class="fas fa-edit nav-icon"></i>
        {{ __('Edit') }}
    </button>


    <form action="{{ route('employees.destroy', $employee->id) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="dropdown-item" title="{{ __('Delete Company.') }}" type="submit"
            onclick="return confirm('Are you sure want to delete this employee?')">
            <i class="fas fa-trash nav-icon"></i>
            {{ __('Delete') }}
        </button>
    </form>




</x-dropdown>

<!-- Modal Edit -->
<div class="modal fade" id="employee-{{ $employee->id }}" tabindex="-1" aria-labelledby="{{ $employee->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog ">
        <form action="{{ route('employees.update', $employee->id) }}" method="post" class="d-inline"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $employee->id }}Label">Edit {{ $employee->fullname() }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @csrf
                @method('patch')
                <div class="modal-body text-left">
                    @include('employees.partials._form-control')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                </div>
        </form>
    </div>
</div>
