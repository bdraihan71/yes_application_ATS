
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

            <div style="border:1px solid black; width: 350px; height: 90px; float: left">
                <div style="float:left; padding: 2%">
                    <img  width="70px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
                </div>
                <div style="text-align:left; font-size: 80%; padding: 2%">
                    <b></b>
                    <b>{{$student->first_name}} {{$student->last_name}}</b><br>
                    <b>Applicant ID: {{$student->applicant_id}}</b><br><br>
                    {{$student->schoolName}}, {{$student->district}}
                </div>
            </div>

            @php
                $count = $count + 1;
                if($count == 22){
                    echo('<div class="page-break"></div>');
                    $count = 0;
                }
            @endphp
        @endforeach
    </body>
</html>
