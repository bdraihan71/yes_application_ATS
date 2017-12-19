@extends('ats.final.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add Slot</h4>
                </div>
                <div class="panel-body">
                    <form action="/ats/final/add/slot" method="post">
                        {{csrf_field()}}
                        <label>Reporting Time:</label>
                        <input class="form-control" type="datetime-local" name="datetime" value="2018-01-07T08:40"><br>
                        <button class="btn btn-default" type="submit">Add Slot</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>


    <div class="row">
        <table border="1">
            <tr>
                <td>Date</td>
                <td>Reporting Time</td>
                <td>Group Interview Start</td>
                <td>Group Interview End</td>
                <td>Individual Interview Start</td>
                <td>Individual Interview End</td>
                <td>Action</td>
            </tr>
        @foreach($final_interview_slots as $slot)
            <tr style="background-color: yellow">
                <td>{{$slot->reporting_time->toDateString()}}</td>
                <td>{{$slot->reporting_time->toTimeString()}}</td>
                <td>{{$slot->group_interview_start_time->toTimeString()}}</td>
                <td>{{$slot->group_interview_end_time->toTimeString()}}</td>
                <td>{{$slot->individual_1_start_time->toTimeString()}}</td>
                <td>{{$slot->individual_6_end_time->toTimeString()}}</td>
                <td>
                    <form method="post" action="/ats/final/delete/slot">
                        {{csrf_field()}}
                        <input type="hidden" name="slot_id" value="{{$slot->id}}">
                        <button type="submit">Delete</button>
                    </form>
                    <a href="/ats/final/slot/{{$slot->id}}">Assign</a>
                </td>
            </tr>
        @if(!empty($slot->getStudent_1))
        <tr>
           <td>{{$slot->individual_1_start_time->toTimeString()}} - {{$slot->individual_1_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_1->getFullInfo()}}</td>
        </tr>
        @else
            <tr>
                <td>{{$slot->individual_1_start_time->toTimeString()}} - {{$slot->individual_1_end_time->toTimeString()}}</td>
                <td>Unassigned</td>
            </tr>

        @endif
        @if(!empty($slot->getStudent_2))
       <tr>
           <td>{{$slot->individual_2_start_time->toTimeString()}} - {{$slot->individual_2_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_2->getFullInfo()}}</td>
       </tr>
        @else
            <tr>
                <td>{{$slot->individual_2_start_time->toTimeString()}} - {{$slot->individual_2_end_time->toTimeString()}}</td>
                <td>Unassigned</td>
            </tr>

        @endif

        @if(!empty($slot->getStudent_3))
       <tr>
           <td>{{$slot->individual_3_start_time->toTimeString()}} - {{$slot->individual_3_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_3->getFullInfo()}}</td>
       </tr>

                @else
                    <tr>
                        <td>{{$slot->individual_3_start_time->toTimeString()}} - {{$slot->individual_3_end_time->toTimeString()}}</td>
                        <td>Unassigned</td>
                    </tr>

                @endif
        @if(!empty($slot->getStudent_4))
       <tr>
           <td>{{$slot->individual_4_start_time->toTimeString()}} - {{$slot->individual_4_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_4->getFullInfo()}}</td>
       </tr>
                @else
                    <tr>
                        <td>{{$slot->individual_4_start_time->toTimeString()}} - {{$slot->individual_4_end_time->toTimeString()}}</td>
                        <td>Unassigned</td>
                    </tr>

                @endif
        @if(!empty($slot->getStudent_5))
       <tr>
           <td>{{$slot->individual_5_start_time->toTimeString()}} - {{$slot->individual_5_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_5->getFullInfo()}}</td>
       </tr>
                @else
                    <tr>
                        <td>{{$slot->individual_5_start_time->toTimeString()}} - {{$slot->individual_5_end_time->toTimeString()}}</td>
                        <td>Unassigned</td>
                    </tr>

                @endif
        @if(!empty($slot->getStudent_6))
       <tr>
           <td>{{$slot->individual_6_start_time->toTimeString()}} - {{$slot->individual_6_end_time->toTimeString()}}</td>
           <td>{{$slot->getStudent_6->getFullInfo()}}</td>
       </tr>
        @else
            <tr>
                <td>{{$slot->individual_6_start_time->toTimeString()}} - {{$slot->individual_6_end_time->toTimeString()}}</td>
                <td>Unassigned</td>
            </tr>

        @endif
@endforeach
</table>
</div>

@endsection
