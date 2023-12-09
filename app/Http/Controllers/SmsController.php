<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        $accountSid = 'AC82b795232ade14845edde25842582477';
        $authToken = '5e5487ccddfaebfa13593527c655f48e';
        $twilioNumber = '+19084184785';

        $recipients = ['+917483444873']; // Add the phone numbers you want to send SMS to
        $totalAmt = $request->input('totalAmt');
        \Log::info('Total Amount: ' . $totalAmt);

        $message = "Payment  of ₹ ".$totalAmt." has been succesfull!!";

        $twilio = new Client($accountSid, $authToken);

        foreach ($recipients as $recipient) {
            try {
                $twilio->messages->create(
                    $recipient,
                    [
                        'from' => $twilioNumber,
                        'body' => $message,
                    ]
                );
            } catch (\Exception $e) {
                // Handle errors if any
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        return response()->json(['message' => 'Payment has been succesfull!!'], 200);
    }
}
