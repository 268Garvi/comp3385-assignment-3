@extends('layouts.app')

@section('content')
    <div class="px-4 py-5 my-5 bg-body-tertiary rounded-3">
        <h1 class="display-5 fw-bold text-body-emphasis">Create Client</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/clients') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<span style="color: red">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Phone<span style="color: red">*</span></label>
                <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required
                       pattern="^\d{3}-\d{3}-\d{4}$">
                <small style="color: #616467">Format: 123-456-7890</small>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address<span style="color: red">*</span></label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                       required placeholder="3383 Antigua Ave, Five Islands Village, Antigua & Barbuda">
            </div>
            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo<span style="color: red">*</span></label>
                <input type="file" class="form-control" id="company_logo" name="company_logo" required>
                <small style="color: #616467">Only image files (e.g. jpg, png) are allowed, and files must be less than 2MB.</small>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
