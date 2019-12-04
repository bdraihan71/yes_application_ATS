@extends('ats.layout')

<!-- Main Content -->
@section('content')


<form method="post" action="{{ route('student.update', $student->id) }}">
    {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Photo Url:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->photo}}" name="photo">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">First Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->first_name}}" name="first_name">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Last Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->last_name}}" name="last_name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">District:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->district}}" name="district">
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">School Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->schoolName}}" name="schoolName">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
