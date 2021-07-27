<x-dropdown>
    <a href="{{ route('companies.show', $company->slug) }}" class="dropdown-item"
        title="{{ __('Company detail.') }}"><i class="far fa-eye nav-icon"></i>
        {{ __('Detail') }}
    </a>
    <a href="{{ route('companies.edit', $company->slug) }}" class="dropdown-item"
        title="{{ __('Edit Company.') }}"><i class="fas fa-edit nav-icon"></i>
        {{ __('Edit') }}
    </a>

    <form action="{{ route('companies.destroy', $company->slug) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="dropdown-item" title="{{ __('Delete Company.') }}">
            <i class="fas fa-trash nav-icon"></i>
            {{ __('Delete') }}
        </button>
    </form>
</x-dropdown>
