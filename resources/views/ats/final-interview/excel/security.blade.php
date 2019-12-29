<html>
<table class="table table-responsive table-sm">
    <thead>
    
    <tr class="row">
        <td>Serial</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
        <td>Parent for Interview</td>
        <td>Student Contact</td>
        <td>Father Contact</td>
        <td>Mother Contact</td>
    </tr>
    </thead>
    @foreach($students as $student)
        {{csrf_field()}}
        <tr class="row">
            <td>{{$student->final_id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->parent_for_interview}}</td>
            <td>{{$student->contact}}</td>
            <td>{{$student->fatherContact}}</td>
            <td>{{$student->motherContact}}</td>
        </tr>
    @endforeach
</table>
</html>