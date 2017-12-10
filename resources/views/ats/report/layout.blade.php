@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif


        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/report/districtwise">Districtwise</a></li>
                <li><a href="/ats/report/school?stage=1">Preliminary Schools</a></li>
                <li><a href="/ats/report/school?stage=2">Phone Interview Schools</a></li>
                <li><a href="/ats/report/school?stage=3">ELTiS Schools</a></li>
                <li><a href="/ats/report/aggregated">Aggregated</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('preliminary_application_content')
        </div>
    </div>
@endsection
