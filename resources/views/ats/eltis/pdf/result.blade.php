
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body style="margin-top: 1.65in; margin-bottom: .6in">

        <table border="1" style="border-collapse: collapse;">
            <tr>
                <td>Serial</td>
                <td>Name</td>
                <td>School</td>
                <!-- <td>Status</td> -->
            </tr>
            @php
                $count = 1;
            @endphp
            @foreach($students as $student)
                @if($student->stage > 3)
                
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$student->first_name}} {!! !empty($student->middle_name)?$student->middle_name:'' !!} {{$student->last_name}}</td>
                    <td>{{$student->schoolName}}</td>
                    <!-- <td>{!! $student->stage == 4 ? 'Successful' : 'Unsuccessful' !!}</td> -->
                    @php
                        $count = $count + 1;
                    @endphp
                </tr>
                @endif
            @endforeach
        </table>
    </body>
</html>
