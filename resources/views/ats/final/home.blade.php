@extends('ats.final.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-4">
            <h3>Not Scored ({{$not_scored_count}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $not_scored])
        </div>
        <div class="col-md-4">
            <h3>Passed ({{count($students_passed)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $students_passed])
        </div>
        <div class="col-md-4">
            <h3>Failed ({{count($students_failed)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $students_failed])
        </div>
    </div>
@endsection
