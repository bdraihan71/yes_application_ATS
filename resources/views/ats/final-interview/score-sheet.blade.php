@extends('ats.final-interview.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-8">
            <h3>Please mention the stage of student, finalist = 7, alternate = 6, unsuccessful = 5</h3>
            <table border="1">
                <form action="/ats/final-interview/score-sheet" method="post">
                    {{csrf_field()}}
                    <tr>
                        <td>Stage</td>
                        <td>Serial</td>
                        <td>Student Name</td>
                    </tr>
                    @php
                        $count = 1;
                    @endphp
                    @if(count($students)>0)
                        @foreach($students as $student)
                            <tr>
                                <td><input value="{{$student->stage}}" type="number" name="{{$student->id}}"></td>
                                <td>{{$student->final_id}}</td>
                                <td><a href="/ats/student/{{$student->id}}/account/1">{{$student->first_name}} {{$student->last_name}}</a></td>
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
