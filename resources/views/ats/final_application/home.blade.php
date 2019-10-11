@extends('ats.final.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-4">
            <h3>Did Not Submit ({{count($did_not_submit_final_application)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $did_not_submit_final_application])
        </div>
        <div class="col-md-4">
            <h3>Submitted ({{count($submitted_final_application)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $submitted_final_application])
        </div>
    </div>
@endsection
