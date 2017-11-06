<html>
<table class="table table-responsive table-sm">
    <thead>
    <tr class="row">
        <td>ID</td>
        <td>Name</td>
        @foreach($criterion as $criteria)
            <td>{{$criteria->label}} </td>
        @endforeach
        <td>Notes</td>
        <td>Actions</td>
    </tr>
    </thead>
    @foreach($students_failed as $student)
        {{csrf_field()}}
        <tr class="row">
            <td>{{$student->id}}</td>
            <td><a href="/ats/student/{{$student->id}}/account/1">{{$student->first_name}}</a></td>
            <input type="hidden" name="student_id" value="{{$student->id}}">
            @foreach($criterion as $criteria)
                @php
                    $criteriawise_score = \App\CriteriawiseScore::where('student_id', $student->id)->where('criteria_id', $criteria->id)->where('score_account_id', $account)->first();
                    if($criteriawise_score){
                    $score = $criteriawise_score->score;
                    }else{
                    $score = 0;
                    }
                @endphp
                <td>{!!$score?"Yes":"No"!!}</td>
            @endforeach
            <td>
                <ul>
                    @foreach($student->notes as $item)
                        <li>{{$item->body}}, {{$item->user->name}}</li>
                    @endforeach
                </ul>
            </td>
        </tr>

    @endforeach
</table>
</html>