<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use AWS;

class SMSController extends Controller
{
    public function sendSMS(){
        $sms = AWS::createClient('sns');
    
        $sms->publish([
                'Message' => 'Hello, Test message',
                'PhoneNumber' => '+8801855316883',	
                // 'PhoneNumber' => '+8801755837774',	
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Promotional',
                        ]
                    ],
                ]);
       
}
}