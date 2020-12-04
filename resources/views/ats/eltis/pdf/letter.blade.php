
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
                        <p>Ref iEARN-BD/YES-19/ELTiS/2020-04</p><br>
                    </div>
                    <div style="width: 200px;  display: inline-table ; margin-left: -100px" >
                        <p><b>December 5, 2020</b></p>
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
                            <p>Applicant ID: {{20210000 + $student->applicant_id +2}}</p>
                            <img width="80px" src="{{$student->photo}}">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p>
                                <b>Sub: Invitation to appear in English Language Test for International Students (ELTiS) and In-Class Essay round of K-L YES Program for the academic year 2021-2022.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}} {{$student->last_name}},</b>
                            </p>
                            <p>
                                Congratulations! You have successfully passed the Phone Interview round in the qualification process of the Kennedy-Lugar Youth Exchange & Study Program of the 2021-2022 academic year. We are delighted to invite you to participate in the next round of the qualification process – the English Language Test for International Students (ELTiS) and In-Class Essay round.
                            </p>
                            <p>
                                For more information on the ELTiS test, please go to this website:<u> www.eltistest.com/students</u>
                            </p>

                            <p>
                                You have been emailed about the time date and venue address of the ELTiS and In Class Essay exam.
                            </p>
                            <p>
                                You <b>MUST</b> report at the examination venue by the given time and stand in line in front of the registration desk.<b>Failure to report at the registration desk within the reporting time will automatically disqualify you from the ELTiS and In-Class Essay round.</b> 
                            </p>
                            <p>
                                After your registration is complete, and your body temperature is tested, you will climb up the stairs of the building to the 3rd floor, and enter the examination venue.
                            </p>
                            <p>
                                Due to the ongoing pandemic only the student will wait in line in front of the registration desk.<b> The parents are NOT allowed to climb up the stairs and go to the exam venue during the examination.</b> After the examination is over, the student <b>MUST</b> leave the exam venue, climb down the stairs, and leave the iEARN-BD office building.
                            </p>
                            <p>
                                You are not allowed to bring your cell phones or any other electronic devices with you to the examination venue. You will be provided with the necessary stationery for the exam at the venue.
                            </p>
                            <p>
                                No T.A./D.A. will be given for appearing in the ELTiS and In-Class Essay Round. 
                            </p>
                            <p>
                                <p>You must also bring your printed preliminary application form with the signature page, and the attested photocopies of the supporting documents you submitted during application, such as transcripts and birth certificate. </p> The supporting documents must be attested by either a gazetted government official or by your school/college institutions’ headmaster/headmistress/principal.
                            </p>

                            <p>
                                <b>Disclaimer: </b>Do not provide any ORIGINAL transcript and birth certificate. Only provide attested photocopies. We will not take responsibility for the safekeeping of your original document(s).
                            </p>

                            <p>
                                We hope to find you in the best health for this round.
                            </p>
                            <p>
                                Best of luck!
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
                    Nawab Wasi Mahmud<br>
                    Director <br>
                    iEARN-BD and K-L YES Program 
                    in Bangladesh
                </div>
                {{-- <div style="width: 350px; display: inline-table" >
                    Address of Exam Venue:<br>
                    FutureED | (6th Floor) Ahmed Tower,<br>
                    28 & 30 Kamal Ataturk Avenue, Banani, Dhaka 1213<br>
                    <img width="250px" src="/images/ats/map.png">
                </div> --}}
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
