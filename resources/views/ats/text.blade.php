@extends('ats.layout')

@section('content')
<form class="col-md-6" action="/sendSMS" method="post">
{{csrf_field()}}
<div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_number" aria-describedby="emailHelp" value="{{$number}}" placeholder="Mobile number">
  </div>
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
