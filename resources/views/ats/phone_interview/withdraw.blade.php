@extends('ats.phone_interview.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <div class="row">
        <div class="col-md-8">
            <h3>Withdraw</h3>
            <form action="" method="post">
                {{csrf_field()}}
                <select class="form-control" name="student_id">
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->applicant_id}}: {{$student->first_name}} {{$student->last_name}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-primary" type="submit">Withdraw Student</button>
            </form>
        </div>
    </div>
@endsection
