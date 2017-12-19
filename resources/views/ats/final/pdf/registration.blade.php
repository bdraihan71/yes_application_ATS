
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
        <img src="/images/ats/yes_logo.png"  style="margin-top:13px; width:12% ; float: left">
        <div style="margin-top:15px; width: 495px; text-align: center; float: left">

            <h3>Kennedy Lugar Youth Exchange and Study (YES) Program</h3>
            <h4>Academic Year 2018-19</h4>
            <h3>Registration Sheet: Final Application & Interview Round</h3>
            <p>Date: 08-12-2017</p>
        </div>
        <img  style="width:100px; background-color: blue ; float: left" src="/images/ats/iearnbd_logo.png">
    </div>


    <div style="clear: left">
        <div class="col" style="width: 9%;">Applicant ID</div>
        <div class="col" style="width: 9%; ">Name</div>
        <div class="col" style="width: 9%; ">Image</div>
        <div class="col" style="width: 18%; ">School, District</div>
        <div class="col" style="width: 15%; ">Contact (Student, Father, Mother)</div>
        <div class="col" style="width: 16%; ">Email</div>
        <div class="col" style="width: 14%; ">Signature</div>
    </div>

    @foreach($students as $student)
        <div>
            <div class="col" style="width: 9%;">{{$student->applicant_id}}</div>
            <div class="col" style="width: 9%; ">{{$student->first_name}} {{$student->last_name}}</div>
            <div class="col" style="width: 9%; text-align: center;">
                <img  width="64px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
            </div>
            <div class="col" style="width: 18%; ">{{$student->schoolName}}, {{$student->district}}</div>
            <div class="col" style="width: 15%; ">{{$student->contact}}, F- {{$student->fatherContact}}, M- {{$student->motherContact}}</div>
            <div class="col" style="width: 16%; ">{{$student->email}}</div>
            <div class="col" style="width: 14%; "></div>
        </div>

        @php
            $count = $count + 1;
        @endphp
        @if($count==9)
            <div class="page-break"></div>
            <div style="height: 1in; width: 100%;">
                <img src="/images/ats/yes_logo.png"  style="margin-top:13px; width:12% ; float: left">
                <div style="margin-top:15px; width: 495px; text-align: center; float: left">

                    <h3>Kennedy Lugar Youth Exchange and Study (YES) Program</h3>
                    <h4>Academic Year 2018-19</h4>
                    <h3>Registration Sheet: Final Application & Interview Round</h3>
                    <p>Date: 7,8 & 9 January 2018</p>
                </div>
                <img  style="width:100px; background-color: blue ; float: left" src="/images/ats/iearnbd_logo.png">
            </div>
            @php
                $count = 0;
            @endphp
        @endif
    @endforeach
    </body>
</html>
