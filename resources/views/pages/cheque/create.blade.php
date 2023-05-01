@extends('pages.layouts.partial.main')
@section('content')
<div class="container">
    <form class="row g-3 needs-validation" action="{{route('cheque.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row page-section">
            <div class="col-md-6 form-group">
                <label for="validationCustom01" class="form-label">File Upload</label>
                <div class="">
                    <input class="form-control" type="file" id="formFile" name="photo">
                </div>
            </div>
            <div class="col-md-6 form-group">
                <label for="validationCustom01" class="form-label">Cheque Number</label>
                <input type="number" class="form-control" id="validationCustom01" name="cheque_no" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="validationCustom02" class="form-label">Cheque Date</label>
                <input type="date" class="form-control" id="validationCustom02" name="cheque_date" required>
            </div>
            <div class="col-md-6 form-grou">
                <label for="validationCustom03" class="form-label">Amount</label>
                <input type="number" class="form-control" id="validationCustom03" name="amount" required>
            </div>

            <div class="col-md-6 form-group">
                <label for="validationCustom03" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="validationCustom03" name="bank_name" required>
            </div>

            <div class="col-md-6 form-grou">
                <label for="validationCustom04" class="form-label">Reminder Before Days</label>
                <select class="form-select" id="validationCustom04" name="reminder_before_days" required>
                    @for($i=1; $i<21; $i++) <option value="{{$i}}">{{$i}}</option>
                        @endfor
                </select>

            </div>

            <div class="col-md-6 form-group">
                <label for="validationCustom03" class="form-label">Party Name</label>
                <input type="text" class="form-control" id="validationCustom03" name="party_name" required>
            </div>


            <div class="col-md-6 form-group">
                <label for="validationCustom03" class="form-label">Party Contact Number</label>
                <input type="number" class="form-control" id="validationCustom03" name="party_contact" required>
            </div>

            <div class="col-md-6 form-group">
                <span for="validationCustom03" class="form-label">With textarea</span>
                <textarea type="number" class="form-control" id="validationCustom03" name="note"></textarea>
            </div>

            <div class="col-md-6 form-group">
                <label for="validationCustom04" class="form-label">Status</label>
                <select class="form-select" id="validationCustom04" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

            </div>

            <div class="col-12 ">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
    </form><!-- End Custom Styled Validation -->
</div>
@endsection