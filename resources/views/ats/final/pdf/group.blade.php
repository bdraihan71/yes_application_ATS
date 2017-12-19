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
            height: 85px;
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
        .info-left div {
            border-bottom: 1px solid black;
            width: 430px;
            margin-top: 20px;
            height: 30px;
            margin-right: 20px;
        }
        .info-right {
            width: 50%;
            float: right;
            height: 70px;
        }
        .info-left {
            float: left;
        }
        .student-info-heading {
            border-top: 1px solid black;
        }
        .student-info-heading div {
            float: left;
            text-align: center;
            font-size: 0.7em;
        }
        .row-1 div{
            text-align: center;
            float: left;
            min-height: 70px;
            border: 1px solid black;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
@foreach($slots as $slot)
<div class="student">
    <div id="header">
        <div class="header-img">
            <img src="/images/ats/iearnbd_logo.png" height="80" width="80">
        </div>
        <div id="heading">
            <h4>International Education and Resource Network – Bangladesh (iEARN-BD)</h4>
            <h4>Kennedy – Lugar Youth Exchange and Study (YES) Program 2018-2019</h4>
            <h3>Group Interview Score Sheet</h3>
        </div>
        <div class="header-img">
            <img src="/images/ats/yes_logo.png" height="80" width="80">
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="interview-info">
        <div class="info-left">
            <h3>Group: </h3>
            <div>Interviewer's Name:</div>
        </div>
        <div class="info-right">
            Discussion Topic (please write in the box):
            <div class="info-box" style="border: 1px solid black">
                <br><br><br>
            </div>
        </div>
    </div>
    <div style="clear: both;"><br></div>
    <div class="student-info-heading">
        <div style="width: 8%">ID</div>
        <div style="width: 20%">Applicant Name</div>
        <div style="width: 6%">Score (0-5)</div>
        <div style="width: 32%">Characteristics Present/Flags</div>
        <div style="width: 32%">Overall Comment</div>
    </div>
    <div style="clear: both;2></div>

    <div class="for-loop-code">
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_1)?"unassigned" :$slot->getStudent_1->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_1)?"unassigned" :$slot->getStudent_1->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_1)?"unassigned" :$slot->getStudent_1->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%;"></div>
        </div>
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_2)?"unassigned" : $slot->getStudent_2->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_2)?"unassigned" : $slot->getStudent_2->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_2)?"unassigned" : $slot->getStudent_2->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%"></div>
        </div>
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_3)?"unassigned" : $slot->getStudent_3->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_3)?"unassigned" : $slot->getStudent_3->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_3)?"unassigned" : $slot->getStudent_3->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%;"></div>
        </div>
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_4)?"unassigned" : $slot->getStudent_4->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_4)?"unassigned" : $slot->getStudent_4->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_4)?"unassigned" : $slot->getStudent_4->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%"></div>
        </div>
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_5)?"unassigned" : $slot->getStudent_5->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_5)?"unassigned" : $slot->getStudent_5->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_5)?"unassigned" : $slot->getStudent_5->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%;"></div>
        </div>
        <div class="row-1">
            <div style="width: 8%">{{empty($slot->getStudent_6)?"unassigned" : $slot->getStudent_6->applicant_id}}</div>
            <div style="width: 15%; overflow-wrap: break-word;">{{empty($slot->getStudent_6)?"unassigned" : $slot->getStudent_6->first_name}}</div>
            <div style="width: 5%"><img style="width: 90%" src="/images/ats/eltis_students/{{empty($slot->getStudent_6)?"unassigned" : $slot->getStudent_6->applicant_id}}.jpg"></div>
            <div style="width: 6%"></div>
            <div style="width: 32%"></div>
            <div style="width: 32%"></div>
        </div>
    </div>
    <div style="clear: both;"><br></div>
    <div class="footer-top-row">
        <div style="overflow-wrap: break-word;width: 7%; float: left; font-weight: bold;font-size: 0.9	em;">Red Flags:</div>
        <div style="width: 50%; border-bottom: 1px solid black;overflow-wrap: break-word; float: left;font-size: 0.7em;">Silent; Overbearing; Aggressive; Disrespectful; Rude; Argumentative; Passive; Talkative; Quiet; Impatient; Shy; Rigid; Arrogant; Uncooperative; Dismissive; Immature; Inattentive</div>
    </div>
    <div style="clear: both;"><br></div>
    <div class="footer-bottom-row">
        <div style="overflow-wrap: break-word;width: 7%; float: left; font-weight: bold;font-size: 0.9em">Well Rounded:</div>
        <div style="width: 50%; border-bottom: 1px solid black;overflow-wrap: break-word; float: left;font-size: 0.7em">Active; Patient; Easy-going; Assertive; Independent; Leader; Flexible; Respectful; Polite; Confident; Diplomatic; Attentive; Creative; Friendly; Humorous; Consensus-Builder; Encouraging; Enthusiastic; Peacemaker; Tolerant</div>
        <div style="width: 30%; float: right; font-weight: bold; text-align: center;border-top: 1px solid black">Interviewer's Signature and date</div>
    </div>
</div>
<div class="page-break"></div>
@endforeach
</body>
</html>