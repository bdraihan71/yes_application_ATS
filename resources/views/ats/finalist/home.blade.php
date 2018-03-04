@extends('ats.finalist.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-4">
            <h3>Finalist ({{count($finalist)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $finalist])
        </div>
        <div class="col-md-4">
            <h3>Alternate ({{count($alternate)}})</h3>
            @include('ats.preliminary_application.partials.application_panel', ['students' => $alternate])
        </div>
    </div>
@endsection
