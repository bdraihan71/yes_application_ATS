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
                <li><a href="/ats/final/schedule">Schedule</a></li>
                <li><a href="/ats/final/schedule-group">Schedule Group</a></li>
                <li><a href="/ats/final/registration">Registration</a></li>
                <li><a href="/ats/final/group/score_sheet">Group Interview Score Sheet</a></li>
                <li><a href="/ats/final/individual/score_sheet/1">Individual Interview Score Sheet 1</a></li>
                <li><a href="/ats/final/individual/score_sheet/2">Individual Interview Score Sheet 2</a></li>
                <li><a href="/ats/final/individual/score_sheet/3">Individual Interview Score Sheet 3</a></li>
                <li><a href="/ats/final/parent_questionnaire">Parent Questionnaire</a></li>
                <li><a href="/ats/final/id_card">ID Card</a></li>
                <li><a href="/ats/final/invitation">Invitation Letter</a></li>
                <li><a href="/ats/final/parent">Parent</a></li>
                <li><a href="/ats/final/envelope">Envelope</a></li>
                <li><a href="#">Score Now!</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('final_content')
        </div>
    </div>
@endsection
