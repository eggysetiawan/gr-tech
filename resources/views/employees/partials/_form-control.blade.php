<div class="form-group">
    <label for="company">Company</label>
    <select name="company" id="company" class="form-control select2 @error('company') is-invalid @enderror">
        @if ($employee->company_id)
            <option value="{{ $employee->company_id }}">{{ $employee->company->name }}</option>

            @foreach ($companies as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        @else
            <option value="" selected>Select a Company</option>
            @foreach ($companies as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        @endif
    </select>

    @error('company')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
        value="{{ old('first_name') ?? $employee->first_name }}" placeholder="ex: Jhon">

    @error('first_name')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
        value="{{ old('last_name') ?? $employee->last_name }}" placeholder="ex: Doe">

    @error('last_name')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') ?? $employee->email }}" placeholder="ex: example@mail.com">

    @error('email')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone') ?? $employee->phone }}" placeholder="ex: 601234567">

    @error('phone')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
