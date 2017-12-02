
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body style="margin-top: 1.65in; margin-bottom: .6in">

        <table border="1" style="border-collapse: collapse;">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>School</td>
                <td>Status</td>
            </tr>

            @foreach($students as $student)
                <tr>
                    <td>{{$student->applicant_id}}</td>
                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                    <td>{{$student->schoolName}}</td>
                    <td>{!! $student->stage == 3 ? 'Successful' : 'Unsuccessful' !!}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
