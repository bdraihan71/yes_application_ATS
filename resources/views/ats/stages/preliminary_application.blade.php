@extends('ats.layout')

<!-- Main Content -->
@section('ats_content')
    <div class="panel panel-default">
        <div class="panel-heading">Preliminary Application</div>

        <div class="panel-body">
            <h3>Passed</h3>
            @foreach($students as $student)
                {{$student->id}} {{$student->first_name}} - Score = 1 - Passed = True <br>
            @endforeach


            @if(isset($students_failed))
            <h3>Failed</h3>
            @foreach($students_failed as $student)
            {{$student->id}} {{$student->first_name}} <br>
            @endforeach
            @endif

            @if(isset($not_scored))
                <h3>Not Scored</h3>
                @foreach($not_scored as $student)
                    {{$student->id}} {{$student->first_name}} <br>
                @endforeach
            @endif

        </div>
    </div>
@endsection
