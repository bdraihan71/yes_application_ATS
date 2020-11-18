@extends('ats.layout')

<!-- Main Content -->
@section('ats_content')
    <div class="panel panel-default">
        <div class="panel-heading">Student Information</div>
        <a href="/ats/student"> All Batch </a><br>
        @foreach($batches as $batch)
            <a href="/ats/student?batch_id={{$batch->id}}">{{$batch->id}} {{$batch->name}} {{$batch->details}} </a><br>
        @endforeach

        <div class="panel-body">
            <h3>Students</h3>
            @foreach($students as $student)
                {{20210000 + $student->applicant_id +2}} {{$student->first_name}} <br>
            @endforeach


        </div>
    </div>
@endsection
