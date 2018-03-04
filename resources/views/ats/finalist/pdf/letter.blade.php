
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
                        <p>Ref: iEARN-BD/YES–16/FinalSelection/2018-01</p><br>
                    </div>
                    <div align="right" style="width: 200px;  display: inline-table" >
                        <p><b>04 March 2018</b></p>
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
                                <b>Sub: Selection to the K-L YES Program for Academic Year 2018-2019.</b>
                            </p>
                            <p>
                                Dear <b>{{$student->first_name}} {{$student->last_name}},</b>
                            </p>
                            <p>
                                Greetings from International Education and Resource Network – Bangladesh and the Kennedy-Lugar Youth Exchange and Study (YES) Program, Bangladesh. It is of utmost pleasure to inform you that you have been selected as a Finalist of the K-L YES Program for the Academic Year 2018-2019! Congratulations!
                            </p>

                            <p>
                                As a finalist, you will be required to provide us any related and required information/documents as and when asked for. As part of the upcoming process, you are to attend and participate, with your parents when instructed to take part in the following activities that are <b>mandatory</b> for all YES program finalists across the world:
                            </p>

                            <ul>
                                <li>
                                    Attend orientation programs and activities from time to time as requested by the YES program officials
                                </li>
                                <li>
                                    Medical Information / administration of vaccinations / documents as and when requested
                                </li>
                                <li>
                                    Participate in Enhancement Activities organized by YES Program
                                </li>
                                <li>
                                    Participate in the community service programs with YES Alumni Bangladesh
                                </li>
                                <li>
                                    Attend formal Pre-Departure Orientation (PDO) with your parents
                                </li>
                                <li>
                                    Promote YES program, with teams of YES Alumni in your institution
                                </li>
                                <li>
                                    Attend the Workbook and Travel Orientation before departure
                                </li>
                            </ul>
                            <p>
                                In addition to all the above mentioned activities, it is requested that you keep regular contact with the YES Program office and comply with the instructions given from time to time. Failure to cooperate and comply with the requirements and instructions provided/requested may lead to the cancellation of your finalist status. If you have difficulty obtaining the requested documents or participation, please notify us beforehand. We are always here to assist you in any matter regarding the K-L YES Program.
                            </p>

                            <p>
                                We are wishing for your full cooperation and further success in the program for being the ideal youth ambassador to Bangladesh. Best of luck!
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
            </div>

            <div class="page-break"></div>
        @endforeach
    </body>
</html>
