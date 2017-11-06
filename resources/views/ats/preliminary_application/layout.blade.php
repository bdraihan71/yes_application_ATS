@extends('layouts.app')

<!-- Main Content -->
@section('content')

    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/preliminary_application/">Application Stacks</a></li>
                <li><a href="/ats/preliminary_application/result">Result</a></li>
                <li><a href="/ats/preliminary_application/backup">Backup</a></li>
                <li><a href="/ats/preliminary_application/import">Import</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="container">

                @yield('preliminary_application_content')
            </div>
        </div>
    </div>
@endsection
