@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <h1>Application Tracking System</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <a href="/ats">ATS Home</a>
                        <a href="/ats/student">Student Information</a>
                        <a href="/ats/file">File</a>
                        <a href="/ats/report/batch/2/account/1/stage/1"><h1>Preliminary Result</h1></a>
                        @php
                            $stages = \App\Stage::all();
                        @endphp
                        @foreach($stages as $stage)
                            <a href="/ats/batch/2/account/1/stage/{{$stage->id}}">{{$stage->name}} {{$stage->details}}</a>
                        @endforeach
                        <a href="/ats/backup/batch/2/account/1/stage/1">Backup</a>
                        <a href="/ats/import">Import</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @yield('ats_content')
            </div>
        </div>
    </div>
@endsection
