@extends('ats.final-interview.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-8">
            <table border="1">
                <form action="/ats/final-interview/parent" method="post">
                    {{csrf_field()}}
                <tr>
                    <td>Serial</td>
                    <td>Student Name</td>
                    <td>Father</td>
                    <td>Mother</td>
                    <td>Parent to Attend Interview </td>
                    <td>Action</td>
                </tr>
            @php
                $count = 1;
            @endphp
            @if(count($students)>0)
                    @foreach($students as $student)
                    <tr>
                        {{-- <td><a href="/ats/student/{{$student->id}}/account/1">{{$student->applicant_id}}</a></td> --}}
                        <td>{{$student->final_id}}</td>
                        <td>{{$student->first_name}} {{$student->last_name}}</td>
                        <td>{{$student->fatherFirstName}} {{$student->fatherMiddleName}} {{$student->fatherLastName}}</td>
                        <td>{{$student->motherFirstName}} {{$student->motherMiddleName}} {{$student->motherLastName}}</td>
                        <td><input tabindex="{{$count}}"  type="text" name="parent[{{$student->id}}]" value="{{empty($student->parent_for_interview)?'':$student->parent_for_interview}}"></td>
                        <td><button type="submit">Save</button></td>
                    </tr>
                    @php $count++ @endphp
                    @endforeach
            @else
            <p>No student in this list.</p>

            @endif
                </form>
            </table>
        </div>
    </div>
@endsection
