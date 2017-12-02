
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
                        <p>Ref: iEARN-BD/YES-16/ELTiS/2017-05</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>02-Dec-2017</b></p>
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
                                <b>Sub: Invitation to appear in English Language Test for International Students (ELTiS) and In-Class Essay stage of K-L YES Program for the 2018-2019 Academic year.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}},</b>
                            </p>
                            <p>
                                Congratulations! You have qualified in the <b>Phone Interview</b> stage of the recruitment of <b>Kennedy Lugar Youth Exchange & Study Program</b> for <b>2018-19 Academic Year.</b> We are delighted to invite you to participate in <b>English Language Test for International Students (ELTiS) and In-Class Essay</b> stage of the recruitment.
                            </p>
                            <p>
                                The ELTiS & In-Class Essay will be held on <b>Friday, 8 December 2017</b> in exam hall of <b>FuturEd</b>, Ahmed Tower (6th Floor), 28 & 30 Kamal Ataturk Avenue, Banani, Dhaka-1213. If you need any assistance to locate venue, please feel free to contact us.
                            </p>
                            <p>
                                The reporting time for Applicant ID ________ to _____ is 08:15am. Exam time- 9:00 am - 11:00 am<br>
                                The reporting time for Applicant ID ________ to _____ is 10:15am. Exam time- 11:00 am - 1:30 pm
                            </p>
                            <p>
                                For more information on ELTiS, please follow the website resource: <b>www.eltistest.com/students/index.php</b>
                            </p>
                            <p>
                                For updates regarding this whole selection process you may frequently visit our website: <b>www.iearnbd.org</b>
                            </p>
                            <p>
                                You MUST report at the testing venue by the given time and enter the exam hall immediately. Failure to show up within reporting time will automatically disqualify you from the process.
                            </p>
                            <p>
                                No T.A./D.A. will be given for appearin in the ELTiS and In-Class Essay Round. <b>Please bring this letter with you at the time of the test, it is mandatory</b>
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
                    {{--<img src="/images/ats/wasi.png"><br>--}}
                    <br><br>
                    Wasi Mahmud Moni <br>
                    Director <br>
                    iEARN-BD and K-L YES Program <br>
                    in Bangladesh
                </div>
                <div style="width: 350px; display: inline-table" >
                    Address of Exam Venue:<br>
                    FutureED | (6th Floor) Ahmed Tower,<br>
                    28-30 Kamal Ataturk Avenue, Banani, Dhaka 1213<br>
                    <img width="300px" src="/images/ats/map.png">
                </div>
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
