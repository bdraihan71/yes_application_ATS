@extends('ats.eltis.layout')

<!-- Main Content -->
@section('eltis_content')
    <form action="/ats/eltis/serial_assignment" method="post" >
    <div class="row">
        <h3>ELTiS Scoring</h3>

        {{csrf_field()}}
        @php
         $count = 1;
        @endphp
        @foreach($students as $student)
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-1">
                            <img  width="64px" src="{{$student->photo}}">
                        </div>
                        <div class="col-md-2">
                           <a target="_blank" href="/ats/student/{{$student->id}}/account/1"> <h3>{{20210000 + $student->applicant_id}}</h3></a>
                        </div>
                        <div class="col-md-2">
                            {{$student->first_name}} {{$student->last_name}}
                        </div>
                        <div class="col-md-2">
                            {{$student->schoolName}}
                        </div>
                        <div class="col-md-2">
                            {{$student->district}}
                        </div>

                        <div class="col-md-2">
                           <input value="{{$student->serial ? $student->serial: $count}}" tabindex="{{$count}}" name="serial[{{$student->id}}]" class="form-control" type="number" required>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-default" type="submit">Save</button>
                        </div>
                        @php
                            $count = $count + 1;
                        @endphp

                    </div>

                </div>
            </div>
        @endforeach

        </form>
    </div>
@endsection
