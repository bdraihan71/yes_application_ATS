<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function syncData($firebase_id){
        $url = "https://yesapplicationtracker.firebaseio.com/applicants/" . $firebase_id. ".json";

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
        $url = "https://yesapplicationtracker.firebaseio.com/applicants.json";

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

        foreach($output2 as $key=>$output){
            $student = Student::where('applicant_id', $output['applicant_id'])->first();

            if($student){
                $student->update($output);
            }else{
                $student = Student::create($output);
            }

            $student->batch_id =  env('AKASH_BATCH');
            $student->stage = 1;
            $student->save();

        }

        return response()->json(['success'=>true]);



    }
}
