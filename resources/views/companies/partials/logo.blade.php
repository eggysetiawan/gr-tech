<a href="{{ asset($company->getFirstMediaUrl('company-logo')) }}" data-toggle="lightbox"
    data-title="{{ $company->name }}" data-gallery="gallery">
    <div class="logo-image-thumb">
        <img src="{{ $company->getFirstMediaUrl('company-logo') }}" alt="{{ $company->slug }}-logo"
            class="img img-thumbnail w-100">
    </div>
</a>
