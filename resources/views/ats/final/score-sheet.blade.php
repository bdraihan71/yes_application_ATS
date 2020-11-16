@extends('ats.final.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-8">
            <h3>Please check the students who did not submit completed final application</h3>
            <table border="1">
                <form action="/ats/final/score-sheet" method="post">
                    {{csrf_field()}}
                    <tr>
                        <td>Did Not Submit</td>
                        <td>Applicant ID</td>
                        <td>Student Name</td>
                    </tr>
                    @php
                        $count = 1;
                    @endphp
                    @if(count($students)>0)
                        @foreach($students as $student)
                            <tr>
                                <td><input value="4" type="checkbox" name="{{$student->id}}" {!!($student->stage==4)?"checked":"unchecked"!!}></td>
                                <td><a href="/ats/student/{{$student->id}}/account/1">{{20210000 + $student->applicant_id}}</a></td>
                                <td>{{$student->first_name}} {{$student->last_name}}</td>
                            </tr>
                            @php $count++ @endphp
                        @endforeach
                    @else
                        <p>No student in this list.</p>

                    @endif
                    <button type="submit">Save</button>
                </form>
            </table>
        </div>
    </div>
@endsection
