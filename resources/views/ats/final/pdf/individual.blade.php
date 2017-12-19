<!doctype html>
<html>
<head>
    <style type="text/css">
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

        #header {
            width: 100%;
            float: left;
            text-align: center;
        }
        #heading {
            width: 76%;
            float: left;
        }
        .header-img {
            width: 12%;
            height: 19%;
            float: left;
        }
        .marking-categories div {
            width: 8.8%;
            overflow-wrap: break-word;
            float: left;
            border: 1px solid black;
            height: 45px;
            text-align: center;
            font-size: 0.8em;
        }
        .marking-fields div {
            width: 8.8%;
            overflow-wrap: break-word;
            float: left;
            border: 1px solid black;
            height: 45px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
@foreach($students as $student)
<div class="student">

    <div id="header">
        <div class="header-img">
            <img src="/images/ats/iearnbd_logo.png" height="100" width="100">
        </div>
        <div id="heading">
            <h4>International Education and Resource Network – Bangladesh (iEARN-BD)</h4>
            <h4>Kennedy – Lugar Youth Exchange and Study (YES) Program 2018-2019</h4>
            <h3>Individual Interview Score Sheet</h3>
        </div>
        <div class="header-img">
            <img src="/images/ats/yes_logo.png" height="100" width="100">
        </div>
    </div>

    <div class="information">
        <div class="interviewer" style="font-size: 0.7em; float: left;width: 50%">Interviewer's Name:</div>
        <div class="student" style="font-size: 0.7em; float: left;width: 38%">Student's Information</div>
        <div style="clear: both"></div>
        <div class="interviewer-name-post" style="float: left;width: 50%; font-size: 0.9em">{{$interviewer}}</div>
        <div class="student-info-img">
            <img  style="margin:2px; width: 60px;border: 1px solid black; float: left" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
            <div class="student-info" style="float: left;">
                <div style="float: left;font-size: 0.8em">Reporting Time: {{$student->reporting_time()}} Applicant ID: {{$student->applicant_id}}</div><br>
                <div style="float: left;font-size: 0.8em">School: {{$student->schoolName}} , {{$student->district}}</div><br>
                <div style="float: left;font-size: 0.8em">Name: {{$student->first_name}} {{$student->last_name}} </div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <h3 style="font-size: 0.8em">A. Individual Interview:</h3><br>
    <p style="font-size: 0.8em">Each field below contains either 0 or 1. The total score for this section ranges from 0 to 10.</p><br>
    <div class="marking-categories">
        <div>OM: Open Mindedness</div>
        <div>SOS: Sense of Self</div>
        <div>ACD: Ability to cope with difficulty</div>
        <div>COM: Communicativeness</div>
        <div>F/A: Flexibility / Adaptability</div>
        <div>CUR: Curiosity</div>
        <div>REEx: Realistic Expectations</div>
        <div>TFD: Tolerance for differences</div>
        <div>PRO: +ve regards for others</div>
        <div>SOH: Sense of Humour</div>
        <div>Total Marks</div>
    </div>
    <div style="clear: both"></div>
    <div class="marking-fields">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div style="clear: both;"><br></div>
    <h3 style="font-size: 0.8em; float: left">B. English Speaking Proficiency (ESP) Score [Please circle the number]:</h3>
    <div style="width: 40px;float: left;"> &nbsp</div>
    <p style="font-size: 0.8em; float: left"><b>5</b> - Superior</p>
    <div style="width: 40px;float: left;"> &nbsp</div>
    <p style="font-size: 0.8em; float: left"><b>4</b> - Advanced</p>
    <div style="width: 40px;float: left;"> &nbsp</div>
    <p style="font-size: 0.8em; float: left"><b>3</b> - Intermediate</p>
    <div style="width: 40px;float: left;"> &nbsp</div>
    <p style="font-size: 0.8em; float: left"><b>2</b> - Weak</p>
    <div style="width: 40px;float: left;"> &nbsp</div>
    <p style="font-size: 0.8em; float: left"><b>1</b> - Minimal</p>
    <div style="clear: both;"></div><br>
    <p style="font-size: 0.8em">Please rate the candidate based on your assessment of the applicant’s performance during the individual interview.</p><br>
    <h3 style="font-size: 0.8em;">C. Interviewer’s Comment:</h3><br>
    <p style="font-size: 0.8em">Please make comment of overall assessment for the candidate.</p>
    <div style="border: 1px solid black; width: 100%; height: 150px"></div><br><br><br>
    <div style="float: right;text-align: center;width: 30%; border-top: 1px solid black;">Interviewer's Signature and Date</div>
</div>
<div class="page-break"></div>
@endforeach
</body>
</html>