{{--<html>--}}
{{--<head>--}}
    {{--<style>--}}
        {{--@page {--}}
            {{--margin: 100px 25px;--}}
        {{--}--}}

        {{--header {--}}
            {{--position: fixed;--}}
            {{--top: -60px;--}}
            {{--left: 0px;--}}
            {{--right: 0px;--}}
            {{--background-color: lightblue;--}}
            {{--height: 50px;--}}
        {{--}--}}

        {{--footer {--}}
            {{--position: fixed;--}}
            {{--bottom: -60px;--}}
            {{--left: 0px;--}}
            {{--right: 0px;--}}
            {{--background-color: lightblue;--}}
            {{--height: 50px;--}}
        {{--}--}}
        {{--p {--}}
            {{--page-break-after: always;--}}
        {{--}--}}

        {{--p:last-child {--}}
            {{--page-break-after: never;--}}
        {{--}--}}
    {{--</style>--}}
{{--</head>--}}


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>

        <table border="1">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>School</td>
                <td>Result</td>
            </tr>

            @foreach($students as $student)
                <tr>
                    <td>{{$student->applicant_id}}</td>
                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                    <td>{{$student->schoolName}}</td>
                    <td>{!! $student->stage == 2 ? 'Passed' : 'Failed' !!}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
