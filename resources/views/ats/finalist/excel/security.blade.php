<html>
<table class="table table-responsive table-sm">
    <thead>
    <tr class="row">
        <td>ID</td>
        <td>Name</td>
    </tr>
    </thead>
    <tr class="row">
        <td>ID</td>
        <td>Applicant ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Parent for Interview</td>
        <td>Student Contact</td>
        <td>Father Contact</td>
        <td>Mother Contact</td>
    </tr>
    @foreach($students as $student)
        {{csrf_field()}}
        <tr class="row">
            <td>{{$student->id}}</td>
            <td>{{20210000 + $student->applicant_id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->last_name}}</td>
            <td>{{$student->parent_for_interview}}</td>
            <td>{{$student->contact}}</td>
            <td>{{$student->fatherContact}}</td>
            <td>{{$student->motherContact}}</td>
        </tr>
    @endforeach
</table>
</html>