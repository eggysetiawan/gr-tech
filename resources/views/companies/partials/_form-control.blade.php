    <div class="form-group">
        <label for="name">{{ __('Company Name') }}</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') ?? $company->name }}" placeholder="ex: GR Tech Company">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') ?? $company->email }}" placeholder="ex: mail@grtech.com.my">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group">
        <label for="website">{{ __('Website') }}</label>
        <input type="text" name="website" id="website" class="form-control @error('website') is-invalid @enderror"
            value="{{ old('website') ?? $company->website }}" placeholder="www.example.com">

        @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>



    <div class="form-group">


        @if (request()->segment(2) == 'create')
            <label for="img">Logo</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="img">
                <label class="custom-file-label" for="img">Choose file</label>
            </div>
    </div>
@else

    <div class="form-group">
        <label for="img">Logo</label>
        <input type="file" name="img" id="img" class="form-control">
    </div>

    @endif


    @if ($company->getFirstMediaUrl('company-logo'))
        <center> <img src="{{ $company->getFirstMediaUrl('company-logo') }}" alt="" class="img-fluid w-50"></center>
    @endif
