
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body style="margin-top: 1.65in; margin-bottom: .6in">

        <table border="1" style="border-collapse: collapse;">

            @foreach($students as $student)
                <tr>
                    <td>{{$student->applicant_id}}</td>
                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                    <td>{{$student->schoolName}}</td>
                    @if($student->stage == 7)
                        <td>Finalist</td>
                    @elseif($student->stage == 6)
                        <td>Alternate</td>
                    @else
                        <td>Unsuccessful</td>
                    @endif
                </tr>
            @endforeach
        </table>
    </body>
</html>
