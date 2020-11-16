
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
                        <p>Ref: iEARN-BD/YES-18/INTERVIEW/2019-06</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>1 January 2020</b></p>
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
                            <p>Serial: {{$student->final_id}}</p>
                            <img width="100px" src="{{$student->photo}}">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p>
                                <b>Sub: Invitation to participate in Step 4: Final Application & Interview Round of K-L YES Program 2021-22.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}} {{$student->last_name}},</b>
                            </p>
                            <p>
                                Congratulations! You have qualified in the <b>ELTiS and In-Class Essay</b> round of <b>Kennedy Lugar Youth Exchange & Study Program</b> for <b>Academic Year 2021-22</b>. We are delighted to invite you to participate in <b>Final Application & Interview Round</b> of the recruitment.
                            </p>

                            <p>
                                Your YES program <b>Final Application</b> has been received and you have been selected to participate in the next phase, which is the <b>Final Interview</b> Round. The interview will be held at the <b>American Center</b>, Dhaka; Progati Sharoni, Plot 1, Baridhara, J-Block, Dhaka 1212.
                            </p>

                            <p>
                                You and your parent, are requested to be present at the venue sharp on <b>{{$student->reporting_time()}}</b>. It is <b>absolutely mandatory</b> for {{$student->parent_for_interview}} to be present with you. Parents and applicants are <b>required</b> to carry a photo ID (e.g. passport/ national ID/ school ID  that has photo and name) with them on the day of the interview. For security reasons, only you and {{$student->parent_for_interview}} will be allowed to enter the venue.
                            </p>

                            <p>
                                You <b>must</b> also bring all your <b>original supporting documents</b> (Birth certificate, Passport, Transcripts, Vaccination Records and Achievement Certificate) that you have submitted along with your <b>Final Application</b> for verification.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div style="width: 300px; display: inline-table">
                    <p>
                        Good luck!
                    </p>
                    {{--<img src="/images/ats/wasi.png"><br>--}}
                    <br><br>
                    Wasi Mahmud Moni <br>
                    Director <br>
                    iEARN-BD and K-L YES Program <br>
                    in Bangladesh
                </div>
                <div style="width: 350px; display: inline-table" >
                    <b>Address of American Center, Dhaka</b><br>
                    Progati Sharoni, Plot 1,<br>
                    Baridhara, J-Block, Dhaka 1212<br>
                    <img width="350px" src="/images/ats/am_center_map.png">
                </div>
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
