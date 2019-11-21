@extends('ats.layout')

<!-- Main Content -->
@section('content')

    <style>
        .big-checkbox {width: 40px; height: 40px;}
        .student-info-table td{
            padding: 2%;
        }
        .student-info-table th{
            padding: 2%;
        }
    </style>



    <div class="row">
        @if( $student->scoresheets->count() == null )
            <a href="/ats/student/{{$student->id - 1}}/account/1" class="btn btn-default">Previous Application</a>
            <a href="/ats/student/{{$student->id + 1}}/account/1" class="btn btn-default pull-right">Next Application</a>
        @endif 
        <!-- <a href="/ats/student/{{$student->id - 1}}/account/1" class="btn btn-default">Previous Application</a>
        <a href="/ats/student/{{$student->id + 1}}/account/1" class="btn btn-default pull-right">Next Application</a> -->
        <hr>
    </div>

    <h3> {{$student->applicant_id}}: {{$student->first_name}} {{$student->last_name}}</h3>

    <div class="row">
        <div class="col-md-8">

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Preliminary Application</div>

                    <div class="panel-body">
                        <div class="row">
                            <div>
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        @foreach($criterion as $criteria)
                                            <td>{{$criteria->label}} </td>
                                        @endforeach
                                        <td>Action</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <form action="/ats/batch/{{env('AKASH_BATCH')}}/account/1/stage/1" method="post">
                                        {{csrf_field()}}
                                        <tr>
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
                                                <td><input class="big-checkbox" name="score[{{$criteria->id}}]" type="checkbox" {!!$score?"checked":"unchecked"!!}></td>
                                            @endforeach
                                                <td><button class="btn btn-xs" type="submit" >Save</button></td>
                                        </tr>
                                    </form>
                                    </tbody>


                                </table>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <form action="/ats/{{$student->id}}/note/1" method="post" >
                                {{csrf_field()}}
                                <input type="text" name="body" class="form-control"><br>
                                <button class="btn btn-default" type="submit">Add Note</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            @if($student->stage>1)
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Phone Interview</div>

                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                        <tr>
                                            @foreach($criterion2 as $criteria)
                                                <td>{{$criteria->label}} </td>
                                            @endforeach
                                            <td>Total</td>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <form action="/ats/batch/{{env('AKASH_BATCH')}}/account/1/stage/2" method="post">
                                            {{csrf_field()}}
                                            <tr>
                                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                                @php
                                                $total = 0;
                                                @endphp
                                                @foreach($criterion2 as $criteria)
                                                    @php
                                                        $criteriawise_score = \App\CriteriawiseScore::where('student_id', $student->id)->where('criteria_id', $criteria->id)->where('score_account_id', $account)->first();
                                                        if($criteriawise_score){
                                                        $score = $criteriawise_score->score;
                                                        $total = $total + $score;
                                                        }else{
                                                        $score = 0;
                                                        }
                                                    @endphp
                                                    {{--                                        <td><input class="big-checkbox" name="score[{{$criteria->id}}]" type="checkbox" {!!$score?"checked":"unchecked"!!}></td>--}}
                                                    <td><input class="form-control" name="score[{{$criteria->id}}]" type="number" min="0" max="{{$criteria->full_score}}" value="{{$score}}"></td>
                                                @endforeach
                                                <td>{{$total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <input type="checkbox" name="is_access_student" {!! $student->is_access_student == true? "checked":""!!}> Applicant is an access student.
                                    <button class="pull-right btn btn-primary btn-xl" type="submit" >Save</button>
                                </form>
                            </div>

                            <div class="panel-footer">
                                <form action="/ats/{{$student->id}}/note/2" method="post" >
                                    {{csrf_field()}}
                                    <input type="text" name="body" class="form-control"><br>
                                    <button class="btn btn-default" type="submit">Add Note</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($student->stage>2)
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">ELTiS</div>

                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                        <tr>
                                            <td>ELTiS Score</td>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{$student->getEltisScore()}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <form action="/ats/{{$student->id}}/note/3" method="post" >
                                    {{csrf_field()}}
                                    <input type="text" name="body" class="form-control"><br>
                                    <button class="btn btn-default" type="submit">Add Note</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Information</div>
                    <div class="panel-body bg-info">
                        <img src="{{$student->photo}}">
                        <h2 class="bg-white">Application ID: {{$student->applicant_id}}</h2>
                        <h4 class="bg-white">ID: {{$student->id}}</h4>
                        <h4 class="bg-white">Status: {{$student->status}}</h4>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Personal Information</h3>
                            <h4 class="bg-white">Applicant Name: {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</h4>
                            <table class="table">
                                <tr class="bg-white">
                                    <th>Date of birth:</th>
                                    <td>{{$student->date_of_birth}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Age on 1st of August, 2018: </th>
                                    <td>{{$student->ageOnFirstAugust}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Citizenship: </th>
                                    <td>{{$student->citizenship}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Birth Certificate: </th>
                                    <td>{{$student->birthCertificate}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Gender: </th>
                                    <td>{{$student->sex}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Facebook URL: </th>
                                    <td>{{$student->facebookURL}}</td>

                                </tr>

                                <tr class="bg-white">
                                    <th>Twitter URL: </th>
                                    <td>{{$student->twitterHandle}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Instagram ID: </th>
                                    <td>{{$student->instagramID}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Contact Information</h3>

                            <table class="table">
                                <tr class="bg-white">
                                    <th>Contact Number: </th>
                                    <td>{{$student->contact}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>District: </th>
                                    <td>{{$student->district}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Thana: </th>
                                    <td>{{$student->thana}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Postal Code: </th>
                                    <td>{{$student->postalCode}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Email address: </th>
                                    <td class="address-field">{{$student->email}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Address: </th>
                                    <td class="address-field">{{$student->address}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Academic Information</h3>

                            <table class="academic-info table">
                                <tr class="bg-white">
                                    <th>Current Grade: </th>
                                    <td>{{$student->classCurrentlyStudying}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Grade in 2016-2017: </th>
                                    <td>{{$student->classStudiedIn20152016}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Grade in 2015-2016: </th>
                                    <td>{{$student->classStudiedIn20142015}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Percentage marks(2017-18): </th>
                                    <td>{{$student->currentPercentageMarks}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Percentage marks(2016-17): </th>
                                    <td>{{$student->percentageMarksIn20152016}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Percentage marks(2015-16): </th>
                                    <td>{{$student->percentageMarksIn20142015}}</td>
                                </tr>
                            </table>

                            <h4 class="bg-white">Transcripts:</h4>

                            <table class="academic-info table">
                                <tr class="bg-white">
                                    <th>Current year transcript:</th>
                                    <td><a href="{{$student->transcriptCurrent}}">{{$student->classCurrentlyStudying}}</a></td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Transcript of 2016-2017:</th>
                                    <td><a href="{{$student->transcript2015}}">{{$student->classStudiedIn20152016}}</a></td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Transcript of 2015-2016:</th>
                                    <td><a href="{{$student->transcript2014}}">{{$student->classStudiedIn20142015}}</a></td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">School Information</h3>

                            <table class="table">
                                <tr class="bg-white">
                                    <th class="school-field-name">School Name: </th>
                                    <td class="school-address-field">{{$student->schoolName}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th class="school-field-name">School's phone number: </th>
                                    <td>{{$student->schoolPhone}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th class="school-field-name">School's address: </th>
                                    <td class="school-address-field">{{$student->schoolAddress}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Parents' Information</h3>

                            <table class="parent-info-table table">
                                <tr class="bg-white">
                                    <th class="parent-info">Father's Information</th>
                                    <td></td>
                                    <th class="parent-info">Mother's Information</th>
                                    <td></td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Name: </th>
                                    <td>{{$student->fatherFirstName}} {{$student->fatherMiddleName}} {{$student->fatherLastName}}</td>
                                    <th>Name: </th>
                                    <td>{{$student->motherFirstName}} {{$student->motherMiddleName}} {{$student->motherLastName}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Phone Number: </th>
                                    <td>{{$student->fatherContact}}</td>
                                    <th>Phone Number: </th>
                                    <td>{{$student->motherContact}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Email address: </th>
                                    <td>{{$student->fatherEmailID}}</td>
                                    <th>Email address: </th>
                                    <td>{{$student->motherEmailID}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Office phone: </th>
                                    <td>{{$student->fatherOfficePhone}}</td>
                                    <th>Office phone: </th>
                                    <td>{{$student->motherOfficePhone}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Occupation: </th>
                                    <td>{{$student->fatherOccupation}}</td>
                                    <th>Occupation: </th>
                                    <td>{{$student->motherOccupation}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Essay Write Ups</h3>

                            <table class="table">
                                <tr class="bg-white">
                                    <th class="parent-info">Write up about community service</th>
                                    <th class="parent-info">Write up about "yourself"</th>
                                </tr>

                                <tr class="bg-white">
                                    <td class="parent-info">{{$student->about_community_work}}</td>
                                    <td class="parent-info">{{$student->about_yourself}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="sub-field">
                            <h3 class="heading bg-white">Travel Information</h3>

                            <table class="table">
                                <tr class="bg-white">
                                    <th>US visit: </th>
                                    <td>{{$student->visitedUS5}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Stay duration: </th>
                                    <td>{{$student->visitedUS5HowLong}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Purpose of visit: </th>
                                    <td>{{$student->visitedUS5Purpose}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Visit place and time: </th>
                                    <td>{{$student->visitedUS5WhenAndWhere}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Green Card holder in family: </th>
                                    <td>{{$student->familyGreenCard}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Family immigration status: </th>
                                    <td>{{$student->familyImmigration}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Family in US: </th>
                                    <td>{{$student->familyLivingInUSA}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>Holds US visa: </th>
                                    <td>{{$student->holdUSVisa}}</td>
                                </tr>

                                <tr class="bg-white">
                                    <th>Visa expiration: </th>
                                    <td>{{$student->holdUSVisaExpiry}}</td>
                                </tr>
                            </table>

                            <table class="table">
                                <tr class="bg-white">
                                    <th>Relative in US: </th>
                                    <td>{{$student->relativesLivingInUSA}}</td>
                                </tr>
                                <tr class="bg-white">
                                    <th>State of residence: </th>
                                    <td>{{$student->relativesLivingInUSAState}}</td>
                                </tr>
                            </table>
                        </div>

                        <h4 class="heading bg-white">Additional Note</h4>
                        <p class="bg-white">{{$student->note}}</p>

                        <div align="right" class="bg-white mb-2">Created on: {{$student->created_at}}</div>
                        <div align="right" class="bg-white">Last updated on: {{$student->updated_at}}</div>
                    </div>

                </div>
            </div>
        </div>
        {{--<div class="col-md-1"></div>--}}
        <div class="col-md-4">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Notes</div>
                    <div class="panel-body">
                        @if(count($student->notes)>0)
                            <ul>
                                @foreach($student->notes as $item)
                                    <p>Stage {{$item->stage}}: {{$item->user->name}} - {{$item->body}}, {{$item->created_at->diffForHumans()}}</p>
                                @endforeach
                            </ul>
                        @else
                            <p>There is no note, please add one</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions History</div>
                    <div class="panel-body" style=" height: 400px; overflow-y: scroll;">
                        <ul>
                            @foreach($action_logs as $log)
                                <li>{{$log->action->name}} by {{$log->action_by_user->name}} on {{$log->created_at->diffForHumans()}} </li>
                                @if($log->action_id == 6 || $log->action_id == 7)
                                    @php
                                        $arr = explode(';', $log->content);
                                        $criteriawise_score_id = explode(':', $arr[0]);

                                        $score = explode(':', $arr[1]);
                                        if($score[1] == 1){
                                            $criteria_name = \App\Criteria::find($criteriawise_score_id[1])->name;
                                        }else{
                                            $criteria_name = \App\Criteria::find($criteriawise_score_id[1])->name . "(NEGATIVE)";
                                        }
                                    @endphp
                                    <b>{{$criteria_name}}</b>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
