@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/final/">Stacks</a></li>
                <li><a href="#">Get Publishable Result</a></li>
                <li><a href="/ats/final/backup">Backup</a></li>
                <li><a href="/ats/final/interview-schedule">Interview Scheduling</a></li>
                <li><a href="/ats/final/registration">Registration</a></li>
                <li><a href="/ats/final/letter">Group Interview Score Sheet</a></li>
                <li><a href="/ats/final/letter">Individual Interview Score Sheet</a></li>
                <li><a href="/ats/final/sit_sticker">Sit Sticker</a></li>
                <li><a href="/ats/final/id_card">ID Card</a></li>
                <li><a href="/ats/final/invitation">Invitation Letter</a></li>
                <li><a href="/ats/final/parent">Parent</a></li>
                <li><a href="#">Envelope</a></li>
                <li><a href="#">Score Now!</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('final_content')
        </div>
    </div>
@endsection
