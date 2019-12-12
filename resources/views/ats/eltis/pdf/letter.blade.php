
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        body{
            font-size: 70%;
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
                        <p>Ref iEARN-BD/YES-18/ELTiS/2019-06</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>December 8, 2019</b></p>
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
                            <p>Serial: {{$student->serial}}</p>
                            <img width="80px" src="{{$student->photo}}">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p>
                                <b>Sub: Invitation to appear in English Language Test for International Students (ELTiS) and In-Class Essay round of K-L YES Program for the academic year 2020-2021.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}} {{$student->last_name}},</b>
                            </p>
                            <p>
                                Congratulations! You have successfully passed the <b>Phone Interview</b> round of the recruitment process of Kennedy-Lugar Youth Exchange & Study Program for the academic year 2020-21. We are delighted to invite you to participate in the <b>English Language Test for International Students (ELTiS) and In-Class Essay</b> round of the recruitment process.
                            </p>
                            <p>
                                The ELTiS & In-Class Essay Examination will be held on <b>Friday, December 13, 2019</b>, in an examination hall of <b>FutureEd</b>, Ahmed Tower (6th Floor), 28 & 30 Kamal Ataturk Avenue, Banani, Dhaka-1213. If you need any assistance locating the venue, please feel free to contact us at +8801313946086.
                            </p>

                            <p>
                                The following is the time slot of your exam. Please follow the list on our website and refer to the serial on this list to know which slot you are in. 
                            </p>
                            <p>
                                <b>
                                The reporting time for SLOT 1: Serial 1 -100 is 08:15am. Exam time- 09:00am - 11:00am <br>
                                The reporting time for SLOT 2: Serial 101- 157 is 10:45am. Exam time- 11:30am - 01:30pm
                                </b>
                            </p>
                            <p>
                                You MUST report at the examination venue by the given time and wait downstairs until a volunteer escorts you to the hall in a group. Please ensure your parents wait downstairs and do not come up with you - it will be disruptive to other exam candidates. <b> Failure to show up within reporting time will automatically disqualify you from the process.</b>
                            </p>
                            <p>
                                You are not allowed to bring your cell phones or any electronic devices with you to the examination hall. You will be provided with stationery at the examination hall.
                            </p>
                            <p>
                                No T.A./D.A. will be given for appearing in the ELTiS and In-Class Essay Round. 
                            </p>
                            <p>
                                <b>Please bring this letter with you on the day of the ELTiS exam.</b>
                            </p>
                            <p>
                                <b>You must also bring the original copy of your printed preliminary application form- with the original signature page and attested copies of the documents you provided with the preliminary application form.</b>(keep a copy for yourself as well).
                            </p>
                            <p>
                                <i>Disclaimer: Do not provide any ORIGINAL transcript, birth certificate </i>- only provide attested copies. We will not take responsibility for the safekeeping of your original document(s). 
                            </p>
                            <p>For any queries, please let us know via email us at yesinfo@iearnbd.org.</p>
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
                    Address of Exam Venue:<br>
                    FutureED | (6th Floor) Ahmed Tower,<br>
                    28 & 30 Kamal Ataturk Avenue, Banani, Dhaka 1213<br>
                    <img width="250px" src="/images/ats/map.png">
                </div>
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
