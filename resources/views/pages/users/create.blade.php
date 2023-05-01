@extends('pages.layouts.partial.main')
@section('content')

<div class="container">
    <!-- Custom Styled Validation -->
    <form class="row g-3 needs-validation" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row page-section">
            <div class="col-md-4 form-group">
                <label for="validationCustom01" class="form-label">File Upload</label>
                <div class="">
                    <input class="form-control" type="file" id="formFile" name="profile_image">
                </div>
            </div>

            <div class="col-md-4 form-group">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="first_name" required>

            </div>
            <div class="col-md-4 form-group">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="last_name" required>

            </div>
            <div class="col-md-4 form-group">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <input type="email" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required>

                </div>
            </div>
            <div class="col-md-4 form-group">
                <label for="validationCustom03" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="validationCustom03" name="phone" required>

            </div>
            <div class="col-md-4 form-group">
                <label for="validationCustom05" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom05" name="address" required>

            </div>
            <div class="col-md-3 form-group">
                <label for="validationCustom05" class="form-label">Pan Vat No</label>
                <input type="text" class="form-control" id="validationCustom05" name="pan_vat" required>

            </div>
            <div class="col-md-3 form-group">
                <label for="validationCustom05" class="form-label">Dob</label>
                <input type="date" class="form-control" id="validationCustom05" name="dob" required>

            </div>
            <div class="col-md-3 form-group">
                <label for="validationCustom04" class="form-label">Gender</label>
                <select class="form-select" id="validationCustom04" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>

            </div>
            <div class="col-md-3 form-group">
                <label for="validationCustom04" class="form-label">Status</label>
                <select class="form-select" id="validationCustom04" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form><!-- End Custom Styled Validation -->
</div>
@endsection