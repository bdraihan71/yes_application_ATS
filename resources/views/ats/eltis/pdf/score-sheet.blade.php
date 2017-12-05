
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
        tr{
            height: 63px;
        }
        .col{
            padding: 2px;
            height: 63px;
            border: 1px solid black;
            float:left;
        }
    </style>

    @php
        $count = 0;
    @endphp


    @include('ats.eltis.pdf.partial.score_sheet_header')

    @foreach($students as $student)
        <div>
            <div class="col" style="width: 8%;">{{$student->applicant_id}}</div>
            <div class="col" style="width: 10%; ">{{$student->first_name}} {{$student->last_name}}</div>
            <div class="col" style="width: 10%; text-align: center ">
                <img  width="64px" src="/images/ats/eltis_students/{{$student->applicant_id}}.jpg">
            </div>
            <div class="col" style="width: 20%; ">{{$student->schoolName}}</div>
            <div class="col" style="width: 10%; ">{{$student->district}}</div>
            <div class="col" style="width: 10%; "></div>
            <div class="col" style="width: 10%; "></div>
            <div class="col" style="width: 15%; "></div>
        </div>

        @php
            $count = $count + 1;
        @endphp
        @if($count==11)
            <div class="page-break"></div>
            @include('ats.eltis.pdf.partial.score_sheet_header')
            @php
                $count = 0;
            @endphp
        @endif
    @endforeach


    {{--<table border="1" style="border-collapse: collapse;">--}}

            {{--@foreach($students as $student)--}}
                {{--<tr>--}}
                    {{--<td>{{$student->applicant_id}}</td>--}}
                    {{--<td>{{$student->first_name}} {{$student->last_name}}</td>--}}
                    {{--<td>{{$student->schoolName}}</td>--}}
                    {{--<td>{{$student->district}}</td>--}}
                    {{--<td colspan="1"></td>--}}
                    {{--<td colspan="1"></td>--}}
                    {{--<td colspan="1"></td>--}}
                {{--</tr>--}}

                {{--@php--}}
                    {{--$count = $count + 1;--}}
                    {{--if($count == 13){--}}
                        {{--echo('    <tr>--}}
                {{--<td>ID</td>--}}
                {{--<td>Name</td>--}}
                {{--<td>School</td>--}}
                {{--<td>District</td>--}}
                {{--<td>ELTiS Mark</td>--}}
                {{--<td>In Class Essay Mark</td>--}}
                {{--<td>Signature</td>--}}
            {{--</tr>');--}}
            {{--echo ('<div class="page-break"></div>');--}}
                        {{--$count = 0;--}}
                    {{--}--}}
                {{--@endphp--}}
            {{--@endforeach--}}
        {{--</table>--}}
    </body>
</html>
