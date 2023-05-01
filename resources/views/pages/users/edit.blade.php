@extends('pages.layouts.partial.main')
@section('content')


<!-- Custom Styled Validation -->
<form class="row g-3 needs-validation" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row page-section">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">File Upload</label>
            <div class="">
                <img src="{{ $user->profile_image }}" height="80" width="80" style="border-radius: 50%;">
                <input class="form-control" type="file" id="formFile">
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" name="first_name" value="{{$user->first_name}}" required>

        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" name="last_name" value="{{$user->last_name}}" required>

        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
                <input type="email" class="form-control" id="validationCustomUsername" name="email" value="{{$user->email}}" aria-describedby="inputGroupPrepend" required>

            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="validationCustom03" name="phone" value="{{$user->phone}}" required>

        </div>
        <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Address</label>
            <input type="text" class="form-control" id="validationCustom05" name="address" value="{{$user->address}}" required>

        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Pan Vat No</label>
            <input type="text" class="form-control" id="validationCustom05" name="pan_vat" value="{{$user->pan_vat}}" required>

        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Dob</label>
            <input type="date" class="form-control" id="validationCustom05" name="dob" value="{{$user->dob}}" required>

        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Gender</label>
            <select class="form-select" id="validationCustom04" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>

        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Status</label>
            <select class="form-select" id="validationCustom04" required>
                <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $user->status ? '' : 'selected' }}>Inactive</option>
            </select>

        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form><!-- End Custom Styled Validation -->
@endsection