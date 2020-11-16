
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>
    <style>
        body{
            font-size: 80%;
            word-wrap: break-word;
        }
        .page-break {
            page-break-after: always;
        }
        .col{
            padding: 2px;
            height: 80px;
            border: 1px solid black;
            float:left;
        }
    </style>

    @php
        $count = 0;
    @endphp


    @include('ats.eltis.pdf.partial.registration_header')

    @foreach($students as $student)
        <div>
            <div class="col" style="width: 9%;">{{$student->serial}}</div>
            <div class="col" style="width: 9%; ">{{$student->first_name}} {{$student->last_name}}</div>
            <div class="col" style="width: 9%; text-align: center;">
                <img  width="64px" height="64px" src="{{$student->photo}}">
            </div>
            <div class="col" style="width: 18%; ">{{$student->schoolName}}, {{$student->district}}</div>
            <div class="col" style="width: 15%; ">{{$student->contact}}, F- {{$student->fatherContact}}, M- {{$student->motherContact}}</div>
            <div class="col" style="width: 16%; ">{{$student->email}}</div>
            <div class="col" style="width: 14%; "></div>
        </div>

        @php
            $count = $count + 1;
        @endphp
        @if($count==9)
            <div class="page-break"></div>
            @include('ats.eltis.pdf.partial.registration_header')
            @php
                $count = 0;
            @endphp
        @endif
    @endforeach
    </body>
</html>
