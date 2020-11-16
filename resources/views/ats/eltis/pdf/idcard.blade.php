
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

        @media print {
            .id-card-eltis {
                margin: 150px 15px 150px 15px ;
            }
        }
    </style>
    <body>

    @php
        $count = 0;
        $serial = 1;
    @endphp
        @foreach($students as $student)

            <div class="id-card-eltis" style="border:1px solid black; height: 718px; width: 320px; float: left;">
                <div class="vol-copy">
                    <br>
                    <div style="float:left; padding: 2%">
                        <img  width="50px" src="{{$student->photo}}">
                    </div>
                    <div style="text-align:left; font-size: 80%; padding: 2%">
                        <b>VOLUNTEER COPY: Give this part to volunteer before entering test-hall</b><br>
                        {{$student->first_name}} {{$student->last_name}}<br>
                        {{$student->schoolName}}
                        <br><br>

                    </div>
                </div>

                <div class="ans-copy">
                    <br>
                    <div style="float:left; padding: 2%">
                        <img  width="50px" src="{{$student->photo}}">
                    </div>
                    <div style="text-align:left; font-size: 80%; padding: 2%">
                        <b>ANSWER SHEET COPY: Attach this part to your ELTiS Answer Script</b><br>
                        {{$student->first_name}} {{$student->last_name}}<br>
                        {{$student->schoolName}}
                        <br><br>
                    </div>
                </div>


                <div>
                    <br>
                    <img src="/images/ats/dos_logo.png" class="logo" width="75px">
                    <img src="/images/ats/yes_logo.png" class="logo" width="75px">
                    <img src="/images/ats/iearnbd_logo.png" class="logo" width="75px">
                    <h4>International Education and Resource Network</h4>
                    <h3>Kennedy-Lugar Youth Exchange</h3>
                    <h3>and Study Program</h3>
                    <h4>Academic Year 2021-2021</h4>
                </div>
                <div>
                    <h1 style="color: darkblue;">ELTiS Test Round</h1>
                    <h3>Friday, 13 December 2019</h3>
                    <img width="100px" src="{{$student->photo}}"><br>
                    <b>{{$student->first_name}} {{$student->last_name}}</b><br>
                    {{$student->schoolName}},
                    {{$student->district}}
                    <p id="app-id">Applicant ID: {{20210000 + $student->applicant_id}}</p>
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
