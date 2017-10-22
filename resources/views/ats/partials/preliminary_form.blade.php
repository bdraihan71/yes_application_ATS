<form action="/{{Request::path()}}" method="post">
    {{csrf_field()}}
    <tr class="row">
        <td>{{$student->id}}</td>
        <td>{{$student->first_name}}</td>
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
    </tr>
</form>