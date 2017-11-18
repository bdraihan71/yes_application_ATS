@extends('ats.preliminary_application.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <div class="row">
        <a href="/ats/preliminary_application/result/publish" class="btn btn-default">Get Publishable Result</a>
    </div>
    <div class="row">
        <h3>Passed ({{count($students)}})</h3>
        @include('ats.preliminary_application.partials.table', ['criterion' => $criterion, 'students' => $students])
    </div>
    <div class="row">
        @if(isset($students_failed))
            <h3>Failed  ({{count($students_failed)}})</h3>
            @include('ats.preliminary_application.partials.table', ['criterion' => $criterion, 'students' => $students_failed])
        @endif
    </div>
@endsection
