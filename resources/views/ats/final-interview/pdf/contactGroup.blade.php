@extends('ats.final-interview.layout')

<!-- Main Content -->
@section('final_content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">

                @foreach($slots as $slot)



                    <h2>{{$slot->reporting_time->format('d-M-Y')}}</h2>
                    <h3>Reporting Time: {{$slot->reporting_time->format('g:i A')}}</h3>
                    <h4>Group Interview Time: {{$slot->group_interview_start_time->format('g:i A')}} - {{$slot->group_interview_end_time->format('g:i A')}}</h4>
                    <table border="1" cellspacing="0">
                        <tr>
                            <td>Application ID</td>
                            <td>Name of Student</td>
                            <td>Name of Parent</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>District</td>
                            <td>Individual Interview Start</td>
                            <td>Individual Interview End</td>
                        </tr>
                        @if(!empty($slot->getStudent_1))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_1->applicant_id}}</td>
                                <td>{{$slot->getStudent_1->first_name}} {{empty($slot->getStudent_1)?'unassigned': $slot->getStudent_1->last_name}}</td>
                                <td>{{$slot->getStudent_1->parent_for_interview}}</td>
                                <td>{{$slot->getStudent_1->contact}}</td>
                                <td>{{$slot->getStudent_1->email}}</td>
                                <td>{{$slot->getStudent_1->district}}</td>
                                <td>{{$slot->individual_1_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_1_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif
                        @if(!empty($slot->getStudent_2))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_2->applicant_id}}</td>
                                <td>{{$slot->getStudent_2->first_name}} {{empty($slot->getStudent_2)?'unassigned': $slot->getStudent_2->last_name}}</td>
                                <td>{{$slot->getStudent_2->parent_for_interview}}</td>
                                 <td>{{$slot->getStudent_2->contact}}</td>
                                <td>{{$slot->getStudent_2->email}}</td>
                                <td>{{$slot->getStudent_2->district}}</td>
                                <td>{{$slot->individual_2_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_2_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif
                        @if(!empty($slot->getStudent_3))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_3->applicant_id}}</td>
                                <td>{{$slot->getStudent_3->first_name}} {{empty($slot->getStudent_3)?'unassigned': $slot->getStudent_3->last_name}}</td>
                                <td>{{$slot->getStudent_3->parent_for_interview}}</td>
                                 <td>{{$slot->getStudent_3->contact}}</td>
                                <td>{{$slot->getStudent_3->email}}</td>
                                <td>{{$slot->getStudent_3->district}}</td>
                                <td>{{$slot->individual_3_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_3_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif
                        @if(!empty($slot->getStudent_4))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_4->applicant_id}}</td>
                                <td>{{$slot->getStudent_4->first_name}} {{empty($slot->getStudent_4)?'unassigned': $slot->getStudent_4->last_name}}</td>
                                <td>{{$slot->getStudent_4->parent_for_interview}}</td>
                                 <td>{{$slot->getStudent_4->contact}}</td>
                                <td>{{$slot->getStudent_4->email}}</td>
                                <td>{{$slot->getStudent_4->district}}</td>
                                <td>{{$slot->individual_4_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_4_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif
                        @if(!empty($slot->getStudent_5))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_5->applicant_id}}</td>
                                <td>{{$slot->getStudent_5->first_name}} {{empty($slot->getStudent_5)?'unassigned': $slot->getStudent_5->last_name}}</td>
                                <td>{{$slot->getStudent_5->parent_for_interview}}</td>
                                 <td>{{$slot->getStudent_5->contact}}</td>
                                <td>{{$slot->getStudent_5->email}}</td>
                                <td>{{$slot->getStudent_5->district}}</td>
                                <td>{{$slot->individual_5_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_5_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif
                        @if(!empty($slot->getStudent_6))
                            <tr>
                                <td>{{20210000 + $slot->getStudent_6->applicant_id}}</td>
                                <td>{{$slot->getStudent_6->first_name}} {{empty($slot->getStudent_6)?'unassigned': $slot->getStudent_6->last_name}}</td>
                                <td>{{$slot->getStudent_6->parent_for_interview}}</td>
                                 <td>{{$slot->getStudent_6->contact}}</td>
                                <td>{{$slot->getStudent_6->email}}</td>
                                <td>{{$slot->getStudent_6->district}}</td>
                                <td>{{$slot->individual_6_start_time->format('g:i A')}}</td>
                                <td>{{$slot->individual_6_end_time->format('g:i A')}}</td>
                            </tr>
                        @endif

                    </table>
                    <div class="page-break"></div>
                @endforeach
            </div>
        </div>
    </div>



@endsection
