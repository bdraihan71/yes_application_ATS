
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

    @foreach($slots as $slot)

        <div style="height: 1in; width: 100%;">
            <img src="/images/ats/yes_logo.png"  style="margin-top:13px; width:10% ; float: left">
            <div style="margin-top:15px; width: 400px; text-align: center; float: left">

                <h3>Kennedy Lugar Youth Exchange and Study (YES) Program</h3>
                <h4>Academic Year 2018-19</h4>
            </div>
            <img  style="width:100px; background-color: blue ; float: left" src="/images/ats/iearnbd_logo.png">
        </div>


        <h2>{{$slot->reporting_time->format('d-M-Y')}}</h2>
        <h3>Reporting Time: {{$slot->reporting_time->format('g:i A')}}</h3>
        <h4>Group Interview Time: {{$slot->group_interview_start_time->format('g:i A')}} - {{$slot->group_interview_end_time->format('g:i A')}}</h4>
        <table border="1" cellspacing="0">
            <tr>
                <td>Applicant ID</td>
                <td>Name of Student</td>
                <td>Name of Parent</td>
                <td>School/College</td>
                <td>District</td>
                <td>Individual Interview Start</td>
                <td>Individual Interview End</td>
            </tr>
        @if(!empty($slot->getStudent_1))
            <tr>
            <td>{{$slot->getStudent_1->applicant_id}}</td>
            <td>{{$slot->getStudent_1->first_name}} {{empty($slot->getStudent_1)?'unassigned': $slot->getStudent_1->last_name}}</td>
            <td>{{$slot->getStudent_1->parent_for_interview}}</td>
            <td>{{$slot->getStudent_1->schoolName}}</td>
            <td>{{$slot->getStudent_1->district}}</td>
            <td>{{$slot->individual_1_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_1_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_2))
            <tr>
            <td>{{$slot->getStudent_2->applicant_id}}</td>
            <td>{{$slot->getStudent_2->first_name}} {{empty($slot->getStudent_2)?'unassigned': $slot->getStudent_2->last_name}}</td>
            <td>{{$slot->getStudent_2->parent_for_interview}}</td>
            <td>{{$slot->getStudent_2->schoolName}}</td>
            <td>{{$slot->getStudent_2->district}}</td>
            <td>{{$slot->individual_2_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_2_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_3))
        <tr>
            <td>{{$slot->getStudent_3->applicant_id}}</td>
            <td>{{$slot->getStudent_3->first_name}} {{empty($slot->getStudent_3)?'unassigned': $slot->getStudent_3->last_name}}</td>
            <td>{{$slot->getStudent_3->parent_for_interview}}</td>
            <td>{{$slot->getStudent_3->schoolName}}</td>
            <td>{{$slot->getStudent_3->district}}</td>
            <td>{{$slot->individual_3_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_3_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_4))
        <tr>
            <td>{{$slot->getStudent_4->applicant_id}}</td>
            <td>{{$slot->getStudent_4->first_name}} {{empty($slot->getStudent_4)?'unassigned': $slot->getStudent_4->last_name}}</td>
            <td>{{$slot->getStudent_4->parent_for_interview}}</td>
            <td>{{$slot->getStudent_4->schoolName}}</td>
            <td>{{$slot->getStudent_4->district}}</td>
            <td>{{$slot->individual_4_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_4_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_5))
        <tr>
            <td>{{$slot->getStudent_5->applicant_id}}</td>
            <td>{{$slot->getStudent_5->first_name}} {{empty($slot->getStudent_5)?'unassigned': $slot->getStudent_5->last_name}}</td>
            <td>{{$slot->getStudent_5->parent_for_interview}}</td>
            <td>{{$slot->getStudent_5->schoolName}}</td>
            <td>{{$slot->getStudent_5->district}}</td>
            <td>{{$slot->individual_5_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_5_end_time->format('g:i A')}}</td>
        </tr>
        @endif
        @if(!empty($slot->getStudent_6))
        <tr>
            <td>{{$slot->getStudent_6->applicant_id}}</td>
            <td>{{$slot->getStudent_6->first_name}} {{empty($slot->getStudent_6)?'unassigned': $slot->getStudent_6->last_name}}</td>
            <td>{{$slot->getStudent_6->parent_for_interview}}</td>
            <td>{{$slot->getStudent_6->schoolName}}</td>
            <td>{{$slot->getStudent_6->district}}</td>
            <td>{{$slot->individual_6_start_time->format('g:i A')}}</td>
            <td>{{$slot->individual_6_end_time->format('g:i A')}}</td>
        </tr>
        @endif

        </table>
        <div class="page-break"></div>
    @endforeach
    </body>
    </table>
</html>
