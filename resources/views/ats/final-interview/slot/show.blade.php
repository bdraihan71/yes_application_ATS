@extends('ats.final-interview.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                Date: {{$slot->reporting_time->toDateString()}}<br>
                Reporting time: {{$slot->reporting_time->toTimeString()}}<br>
                Group Interview Time Start: {{$slot->group_interview_start_time->toTimeString()}}<br>
                Group Interview Time End: {{$slot->group_interview_end_time->toTimeString()}}<br>
                <form method="post" action="/ats/final-interview/slot/{{$slot->id}}/assign">
                    {{csrf_field()}}
                    Individual {{$slot->individual_1_start_time->toTimeString()}} - {{$slot->individual_1_end_time->toTimeString()}}
                    <select name="student_1">
                        @if($slot->student_1!=null)<option selected value="{{$slot->student_1}}">{{$slot->getStudent_1->getFullInfo()}}</option>@endif
                        <option value="0">Not assigned</option>
                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->getFullInfo()}}</option>
                        @endforeach</select><br><br>

                    Individual {{$slot->individual_2_start_time->toTimeString()}} - {{$slot->individual_2_end_time->toTimeString()}}
                    <select name="student_2">
                        @if($slot->student_2!=null)<option selected value="{{$slot->student_2}}">{{$slot->getStudent_2->getFullInfo()}}</option>@endif
                            <option value="0">Not assigned</option>@foreach($students as $student)<option value="{{$student->id}}">{{$student->getFullInfo()}}</option>@endforeach</select><br><br>

                    Individual {{$slot->individual_3_start_time->toTimeString()}} - {{$slot->individual_3_end_time->toTimeString()}}
                    <select name="student_3">
                        @if($slot->student_3!=null)<option selected value="{{$slot->student_3}}">{{$slot->getStudent_3->getFullInfo()}}</option>@endif
                            <option value="0">Not assigned</option>@foreach($students as $student)<option value="{{$student->id}}">{{$student->getFullInfo()}}</option>@endforeach</select><br><br>

                    Individual {{$slot->individual_4_start_time->toTimeString()}} - {{$slot->individual_4_end_time->toTimeString()}}
                    <select name="student_4">
                        @if($slot->student_4!=null)<option selected value="{{$slot->student_4}}">{{$slot->getStudent_4->getFullInfo()}}</option>@endif
                            <option value="0">Not assigned</option>@foreach($students as $student)<option value="{{$student->id}}">{{$student->getFullInfo()}}</option>@endforeach</select><br><br>

                    Individual {{$slot->individual_5_start_time->toTimeString()}} - {{$slot->individual_5_end_time->toTimeString()}}
                    <select name="student_5">
                        @if($slot->student_5!=null)<option selected value="{{$slot->student_5}}">{{$slot->getStudent_5->getFullInfo()}}</option>@endif
                            <option value="0">Not assigned</option>@foreach($students as $student)<option value="{{$student->id}}">{{$student->getFullInfo()}}</option>@endforeach</select><br><br>

                    Individual {{$slot->individual_6_start_time->toTimeString()}} - {{$slot->individual_6_end_time->toTimeString()}}
                    <select name="student_6">
                        @if($slot->student_6!=null)<option selected value="{{$slot->student_6}}">{{$slot->getStudent_6->getFullInfo()}}</option>@endif
                            <option value="0">Not assigned</option>@foreach($students as $student)<option value="{{$student->id}}">{{$student->getFullInfo()}}</option>@endforeach</select><br><br>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>



@endsection
