
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        body{
            font-size: 90%;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
    <body>

        @foreach($students as $student)
            <div style="margin-top: 1in">
                <div>
                    <div style="width: 400px;  display: inline-table">
                        <p>Ref: iEARN-BD/YES-16/INTERVIEW/2017-06</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>21 December 2017</b></p>
                    </div>
                </div>
                <div>
                    <div style="width: 400px; display: inline-table">
                        To:<br><br>
                        <b>{{$student->first_name}} {{$student->last_name}}</b><br>
                        {{$student->schoolName}}<br>
                        {{$student->address}}<br>
                        {{$student->thana}}<br>
                        {{$student->district}}-
                        {{$student->postalCode}}<br><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <div>
                            <p>Applicant ID: {{$student->applicant_id}}</p>
                            <img width="100px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p>
                                <b>Sub: Invitation to participate in Step 4: Final Application & Interview Round of K-LYES Program 2018-19.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}} {{$student->last_name}},</b>
                            </p>
                            <p>
                                Congratulations! You have qualified in ELTiS and In-Class Essay of the Kennedy Lugar Youth Exchange & Study Program for Academic Year 2018-2019. We are delighted to invite you to participate in Final Application & Interview Round of the recruitment.
                            </p>

                            <p>
                                Your YES program Final Application has been received and you have been to participate in the next phase, which is the Group and Individual Interview. The interview will be held at the American Center, Dhaka; Progati Sharoni, Plot 1, J-Block, Dhaka 1212.
                            </p>

                            <p>
                                You are requested to be present at the venue sharp at the time allocated for you. It is absolutely mandatory for one of your parents to be present with you on the day of your interview, please ensure the parent whose name you have provided, come with you to the interview. Parents and applicants are required to carry a photo ID (e.g. passport/ national ID/ Office ID or any ID that has photo and name) with them on the day of the interview. For security reasons, only the designated person mentioned in the online form will be allowed to enter.
                            </p>

                            <p>
                                You must also bring all your original supporting documents (Birth certificate, Passport, Transcripts, Vaccination Records and Achievement Certificate) that you have submitted along with your Final Application for verification.
                            </p>

                            <p>
                                The time slot for your interview is as follows:
                            </p>
                            <p>
                                <b>{{$student->finalInterviewTime()}}</b>
                            </p>

                            <p>
                                Your parent, {{$student->parent_for_interview}} will be attending the parent session. Parent will be required to display national id in the gate of the American Centre, Dhaka.
                            </p>


                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div style="width: 300px; display: inline-table">
                    <p>
                        Good luck.
                    </p>
                    <img src="/images/ats/wasi.png"><br>
                    {{--<br><br>--}}
                    Wasi Mahmud Moni <br>
                    Director <br>
                    iEARN-BD and K-L YES Program <br>
                    in Bangladesh
                </div>
                <div style="width: 350px; display: inline-table" >
                    Address of American Center, Dhaka<br>
                    Progati Sharoni, Plot 1,<br>
                    J-Block, Dhaka 1212<br>
                    <img width="300px" src="/images/ats/am_center_map.png">
                </div>
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
