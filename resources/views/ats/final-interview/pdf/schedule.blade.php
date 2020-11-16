
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>
    <style>
        body{
            font-size: 80%;
            word-wrap: break-word;
        }
        .page-break {
            page-break-after: always;
        }
        .col{
            padding: 2px;
            height: 80px;
            border: 1px solid black;
            float:left;
        }
        h4 {
            display: block;
            -webkit-margin-before: 0px;
            -webkit-margin-after: 2px ;
            -webkit-margin-start: 2px;
            -webkit-margin-end: 0px;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.17em;
            -webkit-margin-before: 0px;
            -webkit-margin-after: 2px;
            -webkit-margin-start: 2px;
            -webkit-margin-end: 0px;
            font-weight: bold;
        }

        p {
            display: block;
            -webkit-margin-before: 2px;
            -webkit-margin-after: 2px;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
        }
    </style>

    @php
        $count = 0;
    @endphp

    <div style="height: 1in; width: 100%;">
        <img src="/images/ats/yes_logo.png"  style="margin-top:13px; width:10% ; float: left">
        <div style="margin-top:15px; width: 700px; text-align: center; float: left">

            <h3>Kennedy Lugar Youth Exchange and Study (YES) Program</h3>
            <h4>Academic Year 2021-22</h4>
            <h3>Interview Schedule</h3>
            <p>Date: 5,6 & 7 January 2020</p>
        </div>
        <img  style="width:100px; background-color: blue ; float: left" src="/images/ats/iearnbd_logo.png">
    </div>


    <div style="clear: left">
        <table border="1" cellspacing="0">
            <tr>
                <td>Serial ID</td>
                <td>Name of Student</td>
                <td>Name of Parent</td>
                <td>School/College</td>
                <td>District</td>
                <td>Reporting Time</td>
                <td>Group Interview Start</td>
                <td>Group Interview End</td>
                <td>Individual Interview Start</td>
                <td>Individual Interview End</td>
            </tr>
    </div>

    @foreach($slots as $slot)
        @if(!empty($slot->getStudent_1))
            <tr>
            <td>{{$slot->getStudent_1->final_id}}</td>
            <td>{{$slot->getStudent_1->first_name}} {{empty($slot->getStudent_1)?'unassigned': $slot->getStudent_1->last_name}}</td>
            <td>{{$slot->getStudent_1->parent_for_interview}}</td>
            <td>{{$slot->getStudent_1->schoolName}}</td>
            <td>{{$slot->getStudent_1->district}}</td>
            <td>{{$slot->getStudent_1->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_1_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_1_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_2))
            <tr>
            <td>{{$slot->getStudent_2->final_id}}</td>
            <td>{{$slot->getStudent_2->first_name}} {{empty($slot->getStudent_2)?'unassigned': $slot->getStudent_2->last_name}}</td>
            <td>{{$slot->getStudent_2->parent_for_interview}}</td>
            <td>{{$slot->getStudent_2->schoolName}}</td>
            <td>{{$slot->getStudent_2->district}}</td>
            <td>{{$slot->getStudent_2->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_2_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_2_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_3))
        <tr>
            <td>{{$slot->getStudent_3->final_id}}</td>
            <td>{{$slot->getStudent_3->first_name}} {{empty($slot->getStudent_3)?'unassigned': $slot->getStudent_3->last_name}}</td>
            <td>{{$slot->getStudent_3->parent_for_interview}}</td>
            <td>{{$slot->getStudent_3->schoolName}}</td>
            <td>{{$slot->getStudent_3->district}}</td>
            <td>{{$slot->getStudent_3->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_3_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_3_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_4))
        <tr>
            <td>{{$slot->getStudent_4->final_id}}</td>
            <td>{{$slot->getStudent_4->first_name}} {{empty($slot->getStudent_4)?'unassigned': $slot->getStudent_4->last_name}}</td>
            <td>{{$slot->getStudent_4->parent_for_interview}}</td>
            <td>{{$slot->getStudent_4->schoolName}}</td>
            <td>{{$slot->getStudent_4->district}}</td>
            <td>{{$slot->getStudent_4->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_4_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_4_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_5))
        <tr>
            <td>{{$slot->getStudent_5->final_id}}</td>
            <td>{{$slot->getStudent_5->first_name}} {{empty($slot->getStudent_5)?'unassigned': $slot->getStudent_5->last_name}}</td>
            <td>{{$slot->getStudent_5->parent_for_interview}}</td>
            <td>{{$slot->getStudent_5->schoolName}}</td>
            <td>{{$slot->getStudent_5->district}}</td>
            <td>{{$slot->getStudent_5->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_5_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_5_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_6))
        <tr>
            <td>{{$slot->getStudent_6->final_id}}</td>
            <td>{{$slot->getStudent_6->first_name}} {{empty($slot->getStudent_6)?'unassigned': $slot->getStudent_6->last_name}}</td>
            <td>{{$slot->getStudent_6->parent_for_interview}}</td>
            <td>{{$slot->getStudent_6->schoolName}}</td>
            <td>{{$slot->getStudent_6->district}}</td>
            <td>{{$slot->getStudent_6->reporting_time()}}</td>
            <td>{{$slot->group_interview_start_time->format('g:i A')}}</td>
            <td>{{$slot->group_interview_end_time->format('g:i A')}}</td>
            <td>{{$slot->individual_6_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_6_end_time->format('g:i A')}}</td>
        </tr>
        @endif
    @endforeach
    </body>
    </table>
</html>
