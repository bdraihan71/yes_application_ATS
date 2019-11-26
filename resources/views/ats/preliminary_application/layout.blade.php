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
                <li><a href="/ats/preliminary_application/">Application Stacks</a></li>
                <li><a href="/ats/preliminary_application/result">Result</a></li>
                <li><a href="/ats/preliminary_application/backup">Backup</a></li>
                <!-- <li><a href="/ats/preliminary_application/import">Import</a></li>
                <li><a href="/ats/preliminary_application/improvise">Improvise</a></li>
                <li><a href="/ats/preliminary_application/sync">Sync Score</a></li> -->
            </ul>
        </div>
        <div class="col-md-9">
            @yield('preliminary_application_content')
        </div>
    </div>
@endsection
