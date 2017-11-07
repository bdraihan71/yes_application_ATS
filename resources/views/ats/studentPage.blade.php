@extends('ats.preliminary_application.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <style>
        .big-checkbox {width: 40px; height: 40px;}
    </style>



    <div class="row">
        <a href="/ats/student/{{$student->id - 1}}/account/1" class="btn btn-default">Previous Application</a>
        <a href="/ats/student/{{$student->id + 1}}/account/1" class="btn btn-default pull-right">Next Application</a>
        <hr>
    </div>


    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Preliminary Application</div>

            <div class="panel-body">
                <h3>{{$student->first_name}} {{$student->last_name}}</h3>
                <div class="row">
                    <div>
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <td>ID</td>
                                @foreach($criterion as $criteria)
                                    <td>{{$criteria->label}} </td>
                                @endforeach
                                <td>Action</td>
                            </tr>
                            </thead>

                            <tbody>
                            <form action="/ats/batch/2/account/1/stage/1" method="post">
                                {{csrf_field()}}
                                <tr>
                                    <td>{{$student->applicant_id}}</td>
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
                                    <td><button class="btn btn-xs" type="submit">Save</button></td>
                                </tr>
                            </form>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Notes</div>
            <div class="panel-body">
                @if(count($student->notes)>0)
                <ul>
                    @foreach($student->notes as $item)
                        <p>{{$item->user->name}} - {{$item->body}}, {{$item->created_at->diffForHumans()}}</p>
                    @endforeach
                </ul>
                @else
                <p>There is no note, please add one</p>
                @endif
            </div>

            <div class="panel-footer">
                <form action="/ats/{{$student->id}}/note" method="post" >
                    {{csrf_field()}}
                    <input type="text" name="body" class="form-control"><br>
                    <button class="btn btn-default" type="submit">Add Note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Student Information</div>
            <div class="panel-body">
                <h2>Application ID: {{$student->application_id}}</h2>
                <h3>ID: {{$student->id}}</h3>
                <h3>Status: {{$student->status}}</h3>

                <div align="right">
                    <a href="{{$student->photo}}">Student's picture</a>
                </div>

                <center>
                    <h3>Personal Information</h3>
                </center>


                <table>
                    <tr>
                        <th>Applicant Name: </th>
                        <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                    </tr>

                    <tr>
                        <th>Date of birth: </th>
                        <td>{{$student->date_of_birth}}</td>
                        <th>Age on 1st of August, 2018: </th>
                        <td>{{$student->ageOnFirstAugust}}</td>
                        <th>Citizenship: </th>
                        <td>{{$student->citizenship}}</td>
                        <th>Birth Certificate: </th>
                        <td>{{$student->birthCertificate}}</td>
                    </tr>

                    <tr>
                        <th>Gender: </th>
                        <td>{{$student->sex}}</td>
                        <th>Facebook URL: </th>
                        <td>{{$student->facebookURL}}</td>
                        <th>Twitter URL: </th>
                        <td>{{$student->twitterHandle}}</td>
                        <th>Instagram ID: </th>
                        <td>{{$student->instagramID}}</td>
                    </tr>
                </table>

                <center>
                    <h3>Contact Information</h3>
                </center>

                <table>
                    <tr>
                        <th>Contact Number: </th>
                        <td>{{$student->contact}}</td>
                        <th>Email address: </th>
                        <td>{{$student->email}}</td>
                        <th>District: </th>
                        <td>{{$student->district}}</td>
                    </tr>

                    <tr>
                        <th>Address: </th>
                        <td>{{$student->address}}</td>
                        <th>Thana: </th>
                        <td>{{$student->thana}}</td>
                        <th>Postal Code: </th>
                        <td>{{$student->postalCode}}</td>
                    </tr>
                </table>

                <center>
                    <h3>Academic Information</h3>
                </center>

                <table>
                    <tr>
                        <th>Current Grade: </th>
                        <td>{{$student->classCurrentlyStudying}}</td>
                        <th>Grade in 2016-2017: </th>
                        <td>{{$student->classStudiedIn20152016}}</td>
                        <th>Grade in 2015-2016 </th>
                        <td>{{$student->classStudiedIn20142015}}</td>
                    </tr>

                    <tr>
                        <th>Percentage marks in current grade: </th>
                        <td>{{$student->currentPercentageMarks}}</td>
                        <th>Percentage marks in 2016-2017: </th>
                        <td>{{$student->percentageMarksIn20152016}}</td>
                        <th>Percentage marks in 2015-2016: </th>
                        <td>{{$student->percentageMarksIn20142015}}</td>
                    </tr>

                    <tr>
                        <th>Transcripts:</th>
                        <td><a href="{{$student->transcriptCurrent}}">Grade {{$student->classCurrentlyStudying}}</a></td>
                        <td><a href="{{$student->transcript2015}}">Grade {{$student->classStudiedIn20152016}}</a></td>
                        <td><a href="{{$student->transcript2014}}">Grade {{$student->classStudiedIn20142015}}</a></td>
                    </tr>
                </table>

                <center>
                    <h3>School Information</h3>
                </center>

                <table>
                    <tr>
                        <th>School Name: </th>
                        <td>{{$student->schoolName}}</td>
                        <th>School's phone number: </th>
                        <td>{{$student->schoolPhone}}</td>
                    </tr>

                    <tr>
                        <th>School's address: </th>
                        <td>{{$student->schoolAddress}}</td>
                    </tr>
                </table>

                <center>
                    <h3>Parents' Information</h3>
                </center>


                <table>
                    <tr>

                        <h4>Father's Information<h4>
                    <tr>
                        <th>Name: </th>
                        <td>{{$student->fatherFirstName}} {{$student->fatherMiddleName}} {{$student->fatherLastName}}</td>
                    </tr>

                    <tr>
                        <th>Phone Number: </th>
                        <td>{{$student->fatherContact}}</td>
                        <th>Email address: </th>
                        <td>{{$student->fatherEmailID}}</td>
                        <th>Office phone: </th>
                        <td>{{$student->fatherOfficePhone}}</td>
                    </tr>

                    <tr>
                        <th>Occupation: </th>
                        <td>{{$student->fatherOccupation}}</td>
                    </tr>
                    </tr>

                    <tr>

                        <h4>Mother's Information<h4>
                    <tr>
                        <th>Name: </th>
                        <td>{{$student->motherFirstName}} {{$student->motherMiddleName}} {{$student->motherLastName}}</td>
                    </tr>

                    <tr>
                        <th>Phone Number: </th>
                        <td>{{$student->motherContact}}</td>
                        <th>Email address: </th>
                        <td>{{$student->motherEmailID}}</td>
                        <th>Office phone: </th>
                        <td>{{$student->motherOfficePhone}}</td>
                    </tr>

                    <tr>
                        <th>Occupation: </th>
                        <td>{{$student->motherOccupation}}</td>
                    </tr>
                    </tr>
                </table>

                <center>
                    <h3>Essay Write Ups</h3>
                </center>

                <table>
                    <tr>
                        <th>Write up about community service</th>
                        <th>Write up about "yourself"</th>
                    </tr>

                    <tr>
                        <td>Write up about community service</td>
                        <td>Write up about "yourself"</td>
                    </tr>
                </table>

                <center>
                    <h3>Travel Information</h3>
                </center>


                <table>
                    <tr>
                        <th>US visit: </th>
                        <td>{{$student->visitedUS5}}</td>
                        <th>Stay duration: </th>
                        <td>{{$student->visitedUS5HowLong}}</td>
                        <th>Purpose of visit: </th>
                        <td>{{$student->visitedUS5Purpose}}</td>
                        <th>Visit place and time: </th>
                        <td>{{$student->visitedUS5WhenAndWhere}}</td>
                    </tr>

                    <tr>
                        <th>Green Card holder in family: </th>
                        <td>{{$student->familyGreenCard}}</td>
                        <th>Family immigration status: </th>
                        <td>{{$student->familyImmigration}}</td>
                        <th>Family in US: </th>
                        <td>{{$student->familyLivingInUSA}}</td>
                    </tr>

                    <tr>
                        <th>Holds US visa: </th>
                        <td>{{$student->holdUSVisa}}</td>
                        <th>Visa expiration: </th>
                        <td>{{$student->holdUSVisaExpiry}}</td>
                        <th>Relative in US: </th>
                        <td>{{$student->relativesLivingInUSA}}</td>
                        <th>State of residence: </th>
                        <td>{{$student->relativesLivingInUSAState}}</td>
                    </tr>
                </table>

                <h4>Additional Note</h4>
                <p>{{$student->note}}</p>

                <div align="right">Created on: {{$student->created_at}}</div>
                <div align="right">Last updated on: {{$student->updated_at}}</div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Actions History</div>
            <div class="panel-body">
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
@endsection
