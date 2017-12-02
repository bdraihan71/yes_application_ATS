
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <body>

        @foreach($students as $student)
            <div style="margin-top: 1in">
                <div>
                    <div style="width: 400px;  display: inline-table">
                        <p>Ref: iEARN-BD/YES-16/ELTiS/150/2016-188</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>11-Dec-2016</b></p>
                    </div>
                </div>
                <div>
                    <div style="width: 400px; display: inline-table">
                        To:<br><br>
                        <b>{{$student->first_name}} {{$student->last_name}}</b><br>
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
                                <b>Sub: Invitation to appear in English Language Tet for International Students (ELTiS) and In-Class Eassay stage of K-L YES Program for the 2017-18 Academic year.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}}</b>
                            </p>
                            <p>
                                Congratulations! You have qualified in the <b>Phone Interview</b> stage of the recruitment of <b>Kennedy Lugar Youth Exchange & Study Program</b> for <b>2018-19 Academic Year.</b> We are delighted to invite you to participate in <b>English Language Test for International Students (ELTiS) and In-Class Essay</b> stage of the recruitment.
                            </p>
                            <p>
                                The ELTiS & In-Class Essay will be held on <b>Friday, 8 December 2017</b> at <b>9:30am</b> in exam hall of <b>FuturEd</b>, Ahmed Tower (6th Floor), 28 & 30 Kamal Ataturk Avenue, Banani, Dhaka-1213. If you need any assistance to locate venue, please feel free to contact us.
                            </p>
                            <p>
                                For more information on ELTiS, please follow the website resource: www.eltistest.com/students/index.php
                            </p>
                            <p>
                                For updates regarding this whole selection process you ay frequently visit our website: <b>www.iearnbd.org</b>
                            </p>
                            <p>
                                You MUST report at the testing venue by <b>08:30 am</b> and enter the exam hall immidiately. Failure to show up within reporting tie will automatically disqualify you from the recruitment.
                            </p>
                            <p>
                                No T.A./D.A. will be given for appearin in the ELTiS and In-Class Essay. <b>Please bring this letter with you at the time of the test.</b>
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
