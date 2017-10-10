@extends('ats.layout')

<!-- Main Content -->
@section('ats_content')
    <div class="panel panel-default">
        <div class="panel-heading">File</div>

        <div class="panel-body">
            @foreach($application_files as $file)
                <h1>{{$file->name}} {{$file->note}}</h1> <br>
                @foreach($file->students as $student)
                    {{$student->id}} {{$student->first_name}} <br>
                @endforeach

            @endforeach

        </div>
    </div>
@endsection
