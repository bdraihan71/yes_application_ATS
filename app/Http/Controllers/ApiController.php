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
            $student = Student::where('applicant_id', $output['application']['id'])->first();
            // dd($output['student']['citizenship']);
            // dd($output['guardian']['father_name']);
            // dd($output['student']['district']);
            // dd($output['application']['id']);

            if($student){
                // $student->update($output);
            }else{
                //$student = Student::create($output);
                $student = new Student;

                //student info
                $student->first_name = $output['f_name'];
                $student->last_name = $output['l_name'];
                $student->email = $output['email'];
                $student->date_of_birth = $output['student']['dob'];
                $student->citizenship = $output['student']['citizenship'];
                $student->other_citizenship = $output['student']['other_citizenship'];
                $student->disability = $output['student']['disability'];
                $student->explanation = $output['student']['explanation'];
                $student->disability_description = $output['student']['disability_description'];
                $student->sex = $output['student']['gender'];
                $student->contact = $output['student']['phone'];
                $student->address = $output['student']['street'];
                $student->district = $output['student']['district'];
                $student->postalCode = $output['student']['postal'];
                $student->thana = $output['student']['thana'];
                $student->passport_no = $output['student']['passport_no'];
                $student->passport_expiry = $output['student']['expiry'];
                $student->photo = $output['student']['photo'];
                $student->birthCertificate = $output['student']['certification'];
                $student->passport_image = $output['student']['passport'];
                $student->birth_place = $output['student']['birth_place'];
                $student->facebookURL = $output['student']['fb'];
                $student->twitterHandle = $output['student']['twitter'];
                $student->instagramID = $output['student']['instagram'];


                //guardian info
                $student->father_present = $output['guardian']['father_present'];
                $student->father_nid = $output['guardian']['father_nid'];
                $student->fatherFirstName = $output['guardian']['father_name'];
                $student->fatherContact = $output['guardian']['father_phone'];
                $student->fatherEmailID = $output['guardian']['father_email'];
                $student->fatherOccupation = $output['guardian']['father_occupation'];
                $student->father_income = $output['guardian']['father_income'];
                $student->mother_present = $output['guardian']['mother_present'];
                $student->motherFirstName = $output['guardian']['mother_name'];
                $student->motherContact = $output['guardian']['mother_phone'];
                $student->motherEmailID = $output['guardian']['mother_email'];
                $student->motherOccupation = $output['guardian']['mother_occupation'];
                $student->mother_nid = $output['guardian']['mother_nid'];
                $student->mother_income = $output['guardian']['mother_income'];


                //school info
                $student->schoolName = $output['school']['name'];
                $student->schoolPhone = $output['school']['phone'];
                $student->schoolAddress = $output['school']['street'];
                $student->school_district = $output['school']['district'];
                $student->school_postal = $output['school']['postal'];
                $student->school_thana = $output['school']['thana'];
                $student->school_principle = $output['school']['principle'];
                $student->school_p_phone = $output['school']['p_phone'];


                //travel info
                $student->visitedUS5 = $output['travel']['us_visit'];
                $student->us_location = $output['travel']['location'];
                $student->visitedUS5Purpose = $output['travel']['purpose'];
                $student->visitedUS5HowLong = $output['travel']['duration'];
                $student->familyImmigration = $output['travel']['immigration'];
                $student->familyGreenCard = $output['travel']['green_card'];
                $student->familyLivingInUSA = $output['travel']['living'];
                $student->relativesLivingInUSA = $output['travel']['relative_living'];
                $student->relativesLivingInUSAState = $output['travel']['relative_state'];
                $student->holdUSVisa = $output['travel']['has_visa'];
                $student->holdUSVisaExpiry = $output['travel']['expires_on'];
                $student->us_other_visit = $output['travel']['other_visit'];
                $student->us_other_visit_names = $output['travel']['names'];
                $student->relative_participant = $output['travel']['relative_participant'];
                $student->participant_details = $output['travel']['participant_details'];
                //question info
                // $student->question_reason = $output['question']['reason'];
                // $student->question_culture = $output['question']['culture'];
                // $student->aboutCommunityWork = $output['question']['community'];
                $student->bio = $output['question']['bio'];
                $student->question_mental = $output['question']['mental'];
                $student->question_promotion = $output['question']['promotion'];
                $student->question_other = $output['question']['other'];

                //academic info
                $student->classCurrentlyStudying = $output['academic']['current'];
                $student->class_study_previous = $output['academic']['previous'];
                $student->class_study_prior = $output['academic']['prior'];
                $student->currentPercentageMarks = $output['academic']['current_marks'];
                $student->percentageMarks_previous_marks = $output['academic']['previous_marks'];
                $student->percentageMarks_prior_marks = $output['academic']['prior_marks'];
                $student->transcriptCurrent = $output['academic']['current_transcript'];
                $student->transcript_previous_transcript = $output['academic']['previous_transcript'];
                $student->transcript_prior_transcript = $output['academic']['prior_transcript'];


                //application info
                $student->application_reviewed = $output['application']['reviewed'];
                $student->application_submitted = $output['application']['submitted'];
                $student->application_generated_at = $output['application']['generated_at'];
                $student->application_applied = $output['application']['applied'];
                $student->application_file_id = $output['application']['location'];
                $student->application_file_url = $output['application']['file_url'];


                //signature info
                $student->signature_form_img = $output['signature']['form_img'];



                //$student->classStudiedIn20162017 = $output['academic'];
                //$student->classStudiedIn20162017 = $output['academic']['previous'];
                // $student->visitedUS5WhenAndWhere = $output[''];
                // $student->school_type = $output[''];
                // $student->aboutYourself = $output[''];
                // $student->ageOnFirstAugust = $output[''];
                $student->applicant_id = $output['application']['id'];
                // $student->fatherLastName = $output[''];
                // $student->fatherMiddleName = $output[''];
                // $student->fatherOfficePhone = $output[''];
                // $student->middle_name = $output[''];
                // $student->motherLastName = $output[''];
                // $student->motherMiddleName = $output[''];
                // $student->note = $output[''];
                // $student->created_at = $output[''];
                // $student->status = $output[''];
                // $student->fatherNameOfWorkplace = $output[''];
                // $student->motherNameOfWorkplace = $output[''];
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

    public function  fatherNid(){
        //$url = env('FIREBASE_DATBASE_URL') . "/applicants.json";
        $url = env('FATHER_NID');
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
            // dd( $output['id']);
            // echo '<pre>';
            //     print_r('ID:'.$output['id']. '  NID:'. $output['guardian']['father_nid']);
            // echo '</pre>';
            // $student = Student::where('applicant_id', $output['id'])->firstOrFail();
            $student = Student::where('applicant_id', $output['id'])->firstOrFail();
           
            $student->father_nid = $output['guardian']['father_nid'];
            $student->save();

        }

        return response()->json(['success'=>true]);



    }
}
