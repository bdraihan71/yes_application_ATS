
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        body{
            padding: 0;
            margin: 0;
            text-align: center;
            width: 100%;
            font-size: 90%;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
    <body>

    @php
        $count = 0;
    @endphp

        @foreach($students as $student)

            <div style="border:1px solid black; height: 700px; width: 320px; float: left;">
                <div>
                    <div style="float:left; padding: 2%">
                        <img  width="50px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
                    </div>
                    <div style="text-align:left; font-size: 80%; padding: 2%">
                        <b>VOLUNTEER COPY: Give this part to volunteer before entering test-hall</b><br>
                        {{$student->first_name}} {{$student->last_name}}<br>
                        Applicant ID: {{$student->applicant_id}}
                        <hr>
                    </div>
                </div>

                <div>
                    <div style="float:left; padding: 2%">
                        <img  width="50px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
                    </div>
                    <div style="text-align:left; font-size: 80%; padding: 2%">
                        <b>ANSWER SHEET COPY: Attach this part to your ELTiS Answer Script</b><br>
                        {{$student->first_name}} {{$student->last_name}}<br>
                        Applicant ID: {{$student->applicant_id}}
                        <hr>
                    </div>
                </div>


                <div>
                    <img src="/images/ats/dos_logo.png" width="75px">
                    <img src="/images/ats/yes_logo.png" width="75px">
                    <img src="/images/ats/iearnbd_logo.png" width="75px">
                    <h4>International Education and Resource Network</h4>
                    <h3>Kennedy-Lugar Youth Exchange and Study Program</h3>
                    <h4>Academic Year 2018-2019</h4>
                </div>
                <div>
                    <h1>ELTiS Test Round</h1>
                    <h3>Friday, 08 December 2017</h3>
                    <img width="100px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg"><br>
                    <b>{{$student->first_name}} {{$student->last_name}}</b><br>
                    {{$student->schoolName}}<br>
                    {{$student->district}}
                    <p>Applicant ID: {{$student->applicant_id}}</p>
                </div>
            </div>

            @php
                $count = $count + 1;
                if($count == 2){
                    echo('<div class="page-break"></div>');
                    $count = 0;
                }
            @endphp
        @endforeach
    </body>
</html>
