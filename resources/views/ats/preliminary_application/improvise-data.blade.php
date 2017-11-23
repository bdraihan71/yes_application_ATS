@extends('ats.preliminary_application.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <h4>The following students have district names that are not actual district. Please rename them.</h4>
    @foreach($students as $district=>$student)
        @if(!isActualDistrict($district))
        <form action="" method="post">
            {{csrf_field()}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$district}}
                </div>

                <div class="panel-body">
                    @foreach($student as $s)
                        <input type="hidden" name="student_ids[]" value="{{$s->id}}">{{$s->applicant_id}}: {{$s->first_name}} {{$s->last_name}}<br>
                    @endforeach
                </div>

                <div class="panel-footer">
                    <select name="rename_to_district_id">
                        @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit">Rename</button>
                </div>
            </div>
        </form>
        @endif
    @endforeach
@endsection
