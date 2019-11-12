<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function syncData($firebase_id){
        $url = env('') . "/applicants/" . $firebase_id. ".json";

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $output = json_decode($output, true);


        $student = Student::where('applicant_id', $output['applicant_id'])->first();

        if($student){
            $student->update($output);
        }else{
            $student = Student::create($output);
        }

        $student->batch_id =  env('AKASH_BATCH');
        $student->save();

        return response()->json(['success'=>true]);

    }

    public function syncAll(){
        //$url = env('FIREBASE_DATBASE_URL') . "/applicants.json";
        $url = env('FIREBASE_DATBASE_URL');

        // create curl resource
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        // dd($output);
        $output = json_decode($output, true);

        $output2 =($output);

        //  dd($output2);
        foreach($output2 as $key=>$output){
            //$student = Student::where('applicant_id', $output['applicant_id'])->first();
            $student = Student::where('applicant_id', $output['id'])->first();
            // dd($output['student']['citizenship']);
            // dd($output['guardian']['father_name']);
            // dd($output['student']['district']);

            if($student){
                // $student->update($output);
            }else{
                //$student = Student::create($output);
                $student = new Student;

                $student->first_name = $output['f_name'];
                $student->application_file_id = $output['application']['location'];
                $student->district = $output['student']['district'];
                // $student->school_type = $output[''];
                $student->aboutCommunityWork = $output['question']['community'];
                // $student->aboutYourself = $output[''];
                $student->address = $output['student']['street'];
                // $student->ageOnFirstAugust = $output[''];
                $student->applicant_id = $output['id'];
                $student->birthCertificate = $output['student']['certification'];
                $student->citizenship = $output['student']['citizenship'];
                $student->classCurrentlyStudying = $output['academic']['current'];
                //$student->classStudiedIn20152016 = $output['academic'];
                //$student->classStudiedIn20152016 = $output['academic']['prior];
                //$student->classStudiedIn20162017 = $output['academic'];
                //$student->classStudiedIn20162017 = $output['academic']['previous'];
                $student->contact = $output['student']['phone'];
                $student->currentPercentageMarks = $output['academic']['current_marks'];
                $student->date_of_birth = $output['student']['dob'];
                $student->email = $output['email'];
                $student->facebookURL = $output['student']['fb'];
                // $student->familyGreenCard = $output[''];
                // $student->familyImmigration = $output[''];
                // $student->familyLivingInUSA = $output[''];
                $student->fatherContact = $output['guardian']['father_phone'];
                $student->fatherEmailID = $output['guardian']['father_email'];
                $student->fatherFirstName = $output['guardian']['father_name'];
                // $student->fatherLastName = $output[''];
                // $student->fatherMiddleName = $output[''];
                $student->fatherOccupation = $output['guardian']['father_occupation'];
                // $student->fatherOfficePhone = $output[''];
                // $student->holdUSVisa = $output[''];
                // $student->holdUSVisaExpiry = $output[''];
                $student->instagramID = $output['student']['instagram'];
                // $student->last_name = $output[''];
                // $student->middle_name = $output[''];
                $student->motherContact = $output['guardian']['mother_phone'];
                $student->motherEmailID = $output['guardian']['mother_email'];
                $student->motherFirstName = $output['guardian']['mother_name'];
                // $student->motherLastName = $output[''];
                // $student->motherMiddleName = $output[''];
                $student->motherOccupation = $output['guardian']['mother_occupation'];
                // $student->percentageMarksIn20152016 = $output[''];
                // $student->percentageMarksIn20162017 = $output[''];
                $student->photo = $output['student']['photo'];
                // $student->note = $output[''];
                $student->postalCode = $output['student']['postal'];
                // $student->relativesLivingInUSA = $output[''];
                // $student->relativesLivingInUSAState = $output[''];
                $student->schoolAddress = $output['school']['street'];
                $student->schoolName = $output['school']['name'];
                // $student->created_at = $output[''];
                // $student->schoolPhone = $output[''];
                $student->sex = $output['student']['gender'];
                // $student->status = $output[''];
                $student->thana = $output['student']['thana'];
                // $student->transcript2015 = $output[''];
                // $student->fatherNameOfWorkplace = $output[''];
                // $student->motherNameOfWorkplace = $output[''];
                // $student->transcript2016 = $output[''];
                $student->transcriptCurrent = $output['academic']['current_transcript'];
                $student->twitterHandle = $output['student']['twitter'];
                // $student->visitedUS5 = $output[''];
                $student->visitedUS5HowLong = $output['travel']['duration'];
                $student->visitedUS5Purpose = $output['travel']['purpose'];
                // $student->visitedUS5WhenAndWhere = $output[''];
                // $student->motherOfficePhone = $output[''];
                // $student->updated_at = $output[''];
                // $student->parent_for_interview = $output[''];

            }

            $student->batch_id =  env('AKASH_BATCH');
            $student->stage = 1;
            $student->is_access_student = false;
            $student->save();

        }

        return response()->json(['success'=>true]);



    }
}
