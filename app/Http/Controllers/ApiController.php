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
                $student->is_access_student = $output[''];
                $student->application_file_id = $output[''];
                $student->district = $output['district'];
                $student->school_type = $output[''];
                $student->aboutCommunityWork = $output[''];
                $student->aboutYourself = $output[''];
                $student->address = $output[''];
                $student->ageOnFirstAugust = $output[''];
                $student->applicant_id = $output[''];
                $student->birthCertificate = $output['f_name'];
                $student->citizenship = $output['f_name'];
                $student->classCurrentlyStudying = $output['f_name'];
                $student->classStudiedIn20152016 = $output['f_name'];
                $student->classStudiedIn20162017 = $output['f_name'];
                $student->contact = $output['f_name'];
                $student->currentPercentageMarks = $output['f_name'];
                $student->date_of_birth = $output['f_name'];
                $student->email = $output['f_name'];
                $student->facebookURL = $output['f_name'];
                $student->familyGreenCard = $output['f_name'];
                $student->familyImmigration = $output['f_name'];
                $student->familyLivingInUSA = $output['f_name'];
                $student->fatherContact = $output['f_name'];
                $student->fatherEmailID = $output['f_name'];
                $student->fatherFirstName = $output['f_name'];
                $student->fatherLastName = $output['f_name'];
                $student->fatherMiddleName = $output['f_name'];
                $student->fatherOccupation = $output['f_name'];
                $student->fatherOfficePhone = $output['f_name'];
                $student->holdUSVisa = $output['f_name'];
                $student->holdUSVisaExpiry = $output['f_name'];
                $student->instagramID = $output['f_name'];
                $student->last_name = $output['f_name'];
                $student->middle_name = $output['f_name'];
                $student->motherContact = $output['f_name'];
                $student->motherEmailID = $output['f_name'];
                $student->motherFirstName = $output['f_name'];
                $student->motherLastName = $output['f_name'];
                $student->motherMiddleName = $output['f_name'];
                $student->motherOccupation = $output['f_name'];
                $student->percentageMarksIn20152016 = $output['f_name'];
                $student->percentageMarksIn20162017 = $output['f_name'];
                $student->photo = $output['f_name'];
                $student->note = $output['f_name'];
                $student->postalCode = $output['f_name'];
                $student->relativesLivingInUSA = $output['f_name'];
                $student->relativesLivingInUSAState = $output['f_name'];
                $student->schoolAddress = $output['f_name'];
                $student->schoolName = $output['f_name'];
                $student->created_at = $output['f_name'];
                $student->schoolPhone = $output['f_name'];
                $student->sex = $output['f_name'];
                $student->status = $output['f_name'];
                $student->thana = $output['f_name'];
                $student->transcript2015 = $output['f_name'];
                $student->fatherNameOfWorkplace = $output['f_name'];
                $student->motherNameOfWorkplace = $output['f_name'];
                $student->transcript2016 = $output['f_name'];
                $student->transcriptCurrent = $output['f_name'];
                $student->twitterHandle = $output['f_name'];
                $student->visitedUS5 = $output['f_name'];
                $student->visitedUS5HowLong = $output['f_name'];
                $student->visitedUS5Purpose = $output['f_name'];
                $student->visitedUS5WhenAndWhere = $output['f_name'];
                $student->motherOfficePhone = $output['f_name'];
                $student->updated_at = $output['f_name'];
                $student->parent_for_interview = $output['f_name'];
               
            }

            $student->batch_id =  env('AKASH_BATCH');
            $student->stage = 1;
            $student->save();

        }

        return response()->json(['success'=>true]);



    }
}
