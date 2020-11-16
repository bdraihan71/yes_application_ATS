
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <style>
        td{
            padding: .05in
        }

        .page-break {
            page-break-after: always;
        }
    </style>
    <body>

        @foreach($students as $student)
            <div>
                <table border="1" style="border-collapse: collapse;">
                    <tr>
                        <td colspan="2" >KL Youth Exchange and Study (Academic Year: 2021-22)</td>
                    </tr>
                    <tr>
                        <td colspan="2" >Phone Interview Score Sheet</td>
                    </tr>
                    <tr>
                        <td>Interviewer</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Applicant ID</td>
                        <td>{{20210000 + $student->applicant_id}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> {{$student->first_name}} {{$student->last_name}}</td>
                    </tr>
                    <tr>
                        <td>School Name</td>
                        <td>{{$student->schoolName}}</td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>{{$student->district}}</td>
                    </tr>
                    <tr>
                        <td>Social Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Listening Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Speaking Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Cultural Awareness (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td colspan="2"> ▢ Applicant is an access student</td>
                    </tr>
                    <tr>
                        <td>Signature</td>
                        <td style="height:.5in">                </td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <table border="1" style="border-collapse: collapse;">
                    <tr>
                        <td colspan="2" >KL Youth Exchange and Study (Academic Year: 2021-22)</td>
                    </tr>
                    <tr>
                        <td colspan="2" >Phone Interview Score Sheet</td>
                    </tr>
                    <tr>
                        <td>Interviewer</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Applicant ID</td>
                        <td>{{20210000 + $student->applicant_id}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td> {{$student->first_name}} {{$student->last_name}}</td>
                    </tr>
                    <tr>
                        <td>School Name</td>
                        <td>{{$student->schoolName}}</td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>{{$student->district}}</td>
                    </tr>
                    <tr>
                        <td>Social Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Listening Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Speaking Skills (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td>Cultural Awareness (1-4)</td>
                        <td>                </td>
                    </tr>
                    <tr>
                        <td colspan="2"> ▢ Applicant is an access student</td>
                    </tr>
                    <tr>
                        <td>Signature</td>
                        <td style="height:.5in">                </td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
            </div>
            <div class="page-break"></div>
        @endforeach
    </body>
</html>
