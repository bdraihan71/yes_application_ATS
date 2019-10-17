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

        $output = json_decode($output, true);

        $output2 =($output);

        dd($output2);
        foreach($output2 as $key=>$output){
            //$student = Student::where('applicant_id', $output['applicant_id'])->first();
            $student = Student::where('applicant_id', $output['user_id'])->first();

            if($student){
                $student->update($output);
            }else{
                //$student = Student::create($output);
                $student = new Student;
               
                $student->first_name = $output['f_name'];
                $student->application_file_id = $output[''];
                $student->district = $output[''];
                $student->school_type = $output[''];
                $student->aboutCommunityWork = $output[''];
                $student->aboutYourself = $output[''];
                $student->address = $output[''];
                $student->ageOnFirstAugust = $output[''];
                $student->applicant_id = $output[''];
                $student->birthCertificate = $output[''];
                $student->citizenship = $output[''];
                $student->classCurrentlyStudying = $output[''];
                $student->classStudiedIn20152016 = $output[''];
                $student->classStudiedIn20162017 = $output[''];
                $student->contact = $output[''];
                $student->currentPercentageMarks = $output[''];
                $student->date_of_birth = $output['dob'];
                $student->email = $output['email'];
                $student->facebookURL = $output['fb'];
                $student->familyGreenCard = $output[''];
                $student->familyImmigration = $output[''];
                $student->familyLivingInUSA = $output[''];
                $student->fatherContact = $output['father_phone'];
                $student->fatherEmailID = $output['father_email'];
                $student->fatherFirstName = $output[''];
                $student->fatherLastName = $output[''];
                $student->fatherMiddleName = $output[''];
                $student->fatherOccupation = $output['father_occupation'];
                $student->fatherOfficePhone = $output[''];
                $student->holdUSVisa = $output[''];
                $student->holdUSVisaExpiry = $output[''];
                $student->instagramID = $output[''];
                $student->last_name = $output[''];
                $student->middle_name = $output[''];
                $student->motherContact = $output['mother_phone'];
                $student->motherEmailID = $output['mother_email'];
                $student->motherFirstName = $output[''];
                $student->motherLastName = $output[''];
                $student->motherMiddleName = $output[''];
                $student->motherOccupation = $output['mother_occupation'];
                $student->percentageMarksIn20152016 = $output[''];
                $student->percentageMarksIn20162017 = $output[''];
                $student->photo = $output[''];
                $student->note = $output[''];
                $student->postalCode = $output[''];
                $student->relativesLivingInUSA = $output[''];
                $student->relativesLivingInUSAState = $output[''];
                $student->schoolAddress = $output[''];
                $student->schoolName = $output[''];
                $student->created_at = $output[''];
                $student->schoolPhone = $output[''];
                $student->sex = $output[''];
                $student->status = $output[''];
                $student->thana = $output[''];
                $student->transcript2015 = $output[''];
                $student->fatherNameOfWorkplace = $output[''];
                $student->motherNameOfWorkplace = $output[''];
                $student->transcript2016 = $output[''];
                $student->transcriptCurrent = $output[''];
                $student->twitterHandle = $output[''];
                $student->visitedUS5 = $output[''];
                $student->visitedUS5HowLong = $output[''];
                $student->visitedUS5Purpose = $output[''];
                $student->visitedUS5WhenAndWhere = $output[''];
                $student->motherOfficePhone = $output[''];
                $student->updated_at = $output[''];
                $student->parent_for_interview = $output[''];

            }

            $student->batch_id =  env('AKASH_BATCH');
            $student->stage = 1;
            $student->is_access_student = false;
            $student->save();

        }

        return response()->json(['success'=>true]);



    }
}
