@extends('ats.layout')

<!-- Main Content -->
@section('content')


<form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
    {{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputEmail1"> Application ID:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="applicant_id" placeholder = " Application ID">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Photo:</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">First Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="first_name" placeholder = "First Name ">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Last Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="last_name" placeholder = "Last Name ">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">District:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="district" placeholder = "District">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">School Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="schoolName" placeholder="District">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">PDF:</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="application_file_url">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
