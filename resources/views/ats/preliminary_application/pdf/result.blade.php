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
    {!! ini_set('max_execution_time', 180) !!}
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style>
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                background-color: lightblue;
                height: 50px;
            }

            footer {
                position: fixed;
                bottom: -60px;
                left: 0px;
                right: 0px;
                background-color: lightblue;
                height: 50px;
            }
            p {
                page-break-after: always;
            }

            p:last-child {
                page-break-after: never;
            }
        </style>

    </head>
    <body>

    <header>
        <p>Kennedy-Lugar Youth Exchange and Study (YES): Academic Year 2018-2019</p>
        <p>Result: Preliminary Application Round</p>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>School</td>
                <td>Result</td>
            </tr>
        </table>
    </header>

    <footer>This result is computer generated and does not require a signature.</footer>

        <table>
            {{--<tr>--}}
                {{--<td>ID</td>--}}
                {{--<td>Name</td>--}}
                {{--<td>School</td>--}}
                {{--<td>Result</td>--}}
            {{--</tr>--}}

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
