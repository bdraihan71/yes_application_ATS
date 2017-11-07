@extends('ats.preliminary_application.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <style>
        .big-checkbox {width: 80px; height: 80px;}

        .personal-info tr th {
            padding: 10px;
        }
        .personal-info tr td {
            padding: 10px;
        }
    </style>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Preliminary Application</div>

            <div class="panel-body">
                <h3>{{$student->first_name}} {{$student->last_name}}</h3>

                <table class="table table-responsive table-bordered table-sm">
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
                <table class="personal-info">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Address</th>
                    </tr>
                    <tr>

                        <td>{{$student->id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->middle_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->contact}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->address}}</td>
                    </tr>
                    <tr>
                        <th>Applicant ID</th>
                        <th>Age on 1st August</th>
                        <th>Citizenship</th>
                        <th>Currently Studying</th>
                        <th>Grade in 2016-2017</th>
                        <th>Grade in 2015-2016</th>
                        <th>Facebook URL</th>
                    </tr>
                    <tr>
                        <td>{{$student->applicant_id}}</td>
                        <td>{{$student->ageOnFirstAugust}}</td>
                        <td>{{$student->citizenship}}</td>
                        <td>{{$student->classCurrentlyStudying}}</td>
                        <td>{{$student->classStudiedIn20152016}}</td>
                        <td>{{$student->classStudiedIn20142015}}</td>
                        <td>{{$student->facebookURL}}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Date of birth</th>
                        <th>Citizenship</th>
                        <th>Currently Studying</th>
                        <th>Grade in 2016-2017</th>
                        <th>Grade in 2015-2016</th>
                        <th>Facebook URL</th>
                    </tr>
                    <tr>
                        <td>{{$student->applicant_id}}</td>
                        <td>{{$student->ageOnFirstAugust}}</td>
                        <td>{{$student->citizenship}}</td>
                        <td>{{$student->classCurrentlyStudying}}</td>
                        <td>{{$student->classStudiedIn20152016}}</td>
                        <td>{{$student->classStudiedIn20142015}}</td>
                        <td>{{$student->facebookURL}}</td>
                    </tr>
                </table>
                <p>aboutCommunityWork: {{$student->aboutCommunityWork}}</p>
                <p>aboutYourself: {{$student->aboutYourself}}</p>
                <p>birthCertificate: {{$student->birthCertificate}}</p>
                <p>currentPercentageMarks: {{$student->currentPercentageMarks}}</p>
                <p>date_of_birth: {{$student->date_of_birth}}</p>
                <p>district: {{$student->district}}</p>
                <p>facebookURL: {{$student->facebookURL}}</p>
                <p>familyGreenCard: {{$student->familyGreenCard}}</p>
                <p>familyImmigration: {{$student->familyImmigration}}</p>
                <p>familyLivingInUSA: {{$student->familyLivingInUSA}}</p>
                <p>fatherContact: {{$student->fatherContact}}</p>
                <p>fatherEmailID: {{$student->fatherEmailID}}</p>
                <p>fatherFirstName: {{$student->fatherFirstName}}</p>
                <p>fatherLastName: {{$student->fatherLastName}}</p>
                <p>fatherMiddleName: {{$student->fatherMiddleName}}</p>
                <p>fatherOccupation: {{$student->fatherOccupation}}</p>
                <p>fatherOfficePhone: {{$student->fatherOfficePhone}}</p>
                <p>holdUSVisa: {{$student->holdUSVisa}}</p>
                <p>holdUSVisaExpiry: {{$student->holdUSVisaExpiry}}</p>
                <p>instagramID: {{$student->instagramID}}</p>
                <p>last_name: {{$student->last_name}}</p>
                <p>middle_name: {{$student->middle_name}}</p>
                <p>motherContact: {{$student->motherContact}}</p>
                <p>motherEmailID: {{$student->motherEmailID}}</p>
                <p>motherFirstName: {{$student->motherFirstName}}</p>
                <p>motherLastName: {{$student->motherLastName}}</p>
                <p>motherMiddleName: {{$student->motherMiddleName}}</p>
                <p>motherOccupation: {{$student->motherOccupation}}</p>
                <p>percentageMarksIn20142015: {{$student->percentageMarksIn20142015}}</p>
                <p>percentageMarksIn20152016: {{$student->percentageMarksIn20152016}}</p>
                <p>photo: {{$student->photo}}</p>
                <p>note: {{$student->note}}</p>
                <p>postalCode: {{$student->postalCode}}</p>
                <p>relativesLivingInUSA: {{$student->relativesLivingInUSA}}</p>
                <p>relativesLivingInUSAState: {{$student->relativesLivingInUSAState}}</p>
                <p>schoolAddress: {{$student->schoolAddress}}</p>
                <p>schoolName: {{$student->schoolName}}</p>
                <p>created_at: {{$student->created_at}}</p>
                <p>schoolPhone: {{$student->schoolPhone}}</p>
                <p>sex: {{$student->sex}}</p>
                <p>status: {{$student->status}}</p>
                <p>thana: {{$student->thana}}</p>
                <p>transcript2014: {{$student->transcript2014}}</p>
                <p>transcript2015: {{$student->transcript2015}}</p>
                <p>transcriptCurrent: {{$student->transcriptCurrent}}</p>
                <p>twitterHandle: {{$student->twitterHandle}}</p>
                <p>visitedUS5: {{$student->visitedUS5}}</p>
                <p>visitedUS5HowLong: {{$student->visitedUS5HowLong}}</p>
                <p>visitedUS5Purpose: {{$student->visitedUS5Purpose}}</p>
                <p>visitedUS5WhenAndWhere: {{$student->visitedUS5WhenAndWhere}}</p>
                <p>motherOfficePhone: {{$student->motherOfficePhone}}</p>
                <p>updated_at: {{$student->updated_at}}</p>
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
