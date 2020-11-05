@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/final-interview/">Stacks</a></li>
                <li><a href="/ats/final-interview/result/publish">Get Publishable Result</a></li>
                {{-- <li><a href="/ats/final-interview/backup">Backup</a></li> --}}
                <li><a href="/ats/final-interview/security">Security</a></li>
                <li><a href="/ats/final-interview/interview-schedule">Interview Scheduling</a></li>
                <li><a href="/ats/final-interview/schedule">Schedule</a></li>
                <li><a href="/ats/final-interview/schedule-group">Schedule Group</a></li>
                <li><a href="/ats/final-interview/registration">Registration</a></li>
                <li><a href="/ats/final-interview/group/score_sheet">Group Interview Score Sheet</a></li>
                <li><a href="/ats/final-interview/individual/score_sheet/1">Individual Interview Score Sheet 1</a></li>
                <li><a href="/ats/final-interview/individual/score_sheet/2">Individual Interview Score Sheet 2</a></li>
                <li><a href="/ats/final-interview/individual/score_sheet/3">Individual Interview Score Sheet 3</a></li>
                <li><a href="/ats/final-interview/parent_questionnaire">Parent Questionnaire</a></li>
                <li><a href="/ats/final-interview/id_card">ID Card</a></li>
                <li><a href="/ats/final-interview/parent_id_card">Parent ID Card</a></li>
                <li><a href="/ats/final-interview/invitation">Invitation Letter</a></li>
                <li><a href="/ats/final-interview/parent">Parent</a></li>
                <li><a href="/ats/final-interview/envelope">Envelope</a></li>
                <li><a href="/ats/final-interview/contact">Group Wise Contact</a></li>
                <li><a href="/ats/final-interview/hfletter-scoresheet">HF Letter Score Sheet</a></li>
                <li><a href="/ats/final-interview/teacher-recommendation-scoresheet">Teacher Recommendation Score Sheet</a></li>
                <li><a href="/ats/final-interview/activity-achievement-scoresheet">Activity Achievement Score Sheet</a></li>
                <li><a href="/ats/final-interview/overall-appraisal-scoresheet">Overall Appraisal Score Sheet</a></li>
                <li><a href="/ats/final-interview/score-sheet">Score Now!</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('final_content')
        </div>
    </div>
@endsection
