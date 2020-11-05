@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/phone_interview/">Stacks</a></li>
                <li><a href="/ats/phone_interview/result">Result</a></li>
                {{-- <li><a href="/ats/phone_interview/backup">Backup</a></li> --}}
                <li><a href="/ats/phone_interview/withdraw">Withdraw</a></li>
                <li><a href="/ats/phone_interview/score_sheet">Score Sheet</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('preliminary_application_content')
        </div>
    </div>
@endsection
