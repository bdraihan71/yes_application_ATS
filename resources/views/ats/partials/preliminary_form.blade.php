<form action="/{{Request::path()}}" method="post">
    {{csrf_field()}}
    <tr class="row">
        <td>{{20210000 + $student->applicant_id +2}}</td>
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
        <td><input name="score[{{$criteria->id}}]" type="checkbox" {!!$score?"checked":"unchecked"!!}></td>
        @endforeach
        <td><button class="btn btn-xs" type="submit">Save</button></td>
</form>
        <td>
             <ul>
            @foreach($student->notes as $item)
                <li>{{$item->body}}, {{$item->user->name}}</li>
            @endforeach
            </ul>

        </td>
    </tr>
