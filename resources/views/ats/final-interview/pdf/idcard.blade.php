
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
        .logo {
            padding-right: 10px;
            padding-left: 10px;
        }
        h1, h2, h3, h4 {
            padding: 0;
            margin: 5px;
        }

        .vol-copy, .ans-copy {
            border-bottom: 1px dotted black;
        }
        #app-id {
            border-top: 3px solid red;
            border-bottom: 3px solid red;
        }
    </style>
    <body>

    @php
        $count = 0;
    @endphp

        @foreach($students as $student)

            <div style="border:1px solid black; height: 700px; width: 340px; float: left;">
                <div>
                    <br>
                    <img src="/images/ats/dos_logo.png" class="logo" width="75px">
                    <img src="/images/ats/yes_logo.png" class="logo" width="75px">
                    <img src="/images/ats/iearnbd_logo.png" class="logo" width="75px">
                    <h4>International Education and Resource Network</h4>
                    <h3>Kennedy-Lugar Youth Exchange</h3>
                    <h3>and Study Program</h3>
                    <h4>Academic Year 2021-22</h4>
                </div>
                <div>
                    <h1 style="color: darkblue;">Final Application & Interview Round</h1>
                    <h3>5,6 & 7 January 2020</h3>
                    <img width="100px" src="{{$student->photo}}"><br>
                    <b>{{$student->first_name}} {{$student->last_name}}</b><br>
                    {{$student->schoolName}},
                    {{$student->district}}
                    <p id="app-id">Application ID: {{20210000 + $student->applicant_id}}</p>
                </div>
                <div>
                    <h3>Reporting Time:</h3>
                    <p>{{$student->reporting_time()}}</p>
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
