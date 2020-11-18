@if(count($students)>0)
    @foreach($students as $student)
        <a href="/ats/student/{{$student->id}}/account/1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{20210000 + $student->applicant_id +2}} </h4>
                </div>
                <div class="panel-body">
                    <p><span class="glyphicon glyphicon-user"></span> {{$student->first_name}} {{$student->last_name}}</p>
                    <p><span class="glyphicon glyphicon-blackboard"></span> {{$student->schoolName}}, {{$student->district}}</p>
                    <p><span class="glyphicon glyphicon-phone"></span> {{$student->contact}}</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> {{$student->email}}</p>
                </div>
            </div>
        </a>
    @endforeach
@else
    <p>No student in this list.</p>
@endif