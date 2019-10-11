@extends('ats.final-interview.layout')

<!-- Main Content -->
@section('final_content')
<div class="row">
    <div class="col-md-4">
        <h3>Unsuccessful ({{count($unsuccessful)}})</h3>
        @include('ats.preliminary_application.partials.application_panel', ['students' => $unsuccessful])
    </div>
    <div class="col-md-4">
        <h3>Successful ({{count($successful)}})</h3>
        @include('ats.preliminary_application.partials.application_panel', ['students' => $successful])
    </div>
</div>
@endsection
