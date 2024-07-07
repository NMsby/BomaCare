<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payments');
    }

    
    private function getAccessToken()
    {
        // Replace with your actual consumerKey and consumerSecret
        $consumerKey = "sF1Yl7KfggOdl7nMtGJ18uuHwzlD4b8GmMX4GFyizEPj4FXL";
        $consumerSecret = "s2lAFyCeLP9vJ9CWtDXoBvYd4Q7goOBRKbjEbGl3x5S2GWtJ3jr3kcLgIUcuAQCN";

        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        
        $headers = ['Content-Type:application/json; charset=utf8'];

        $response = Http::withHeaders(['Authorization' => 'Basic ' . base64_encode($consumerKey . ':' . $consumerSecret)])
            ->get($access_token_url);

        $result = $response->json();

        return $result['access_token'];
    }


    public function initiatePayment(Request $request)
    {

    $access_token = $this->getAccessToken();

    $processRequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $callbackUrl = 'https://1ba1-156-0-232-51.ngrok-free.app';
    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $businessShortCode = '174379';
    $timestamp = now()->format('YmdHis');

    $password = base64_encode($businessShortCode . $passkey . $timestamp);
    $phone = $request->input('phone');
    $amount = $request->input('amount');
    // Get values from the request

    $partyA = $phone;
    $partyB = '174379';
    $accountReference = 'Bomacare';
    $transactionDesc = 'Service Fee';

    $stkPushHeader = ['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $access_token];

    $curlPostData = [
        'BusinessShortCode' => $businessShortCode,
        'Password' => $password,
        'Timestamp' => $timestamp,
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $partyA,
        'PartyB' => $businessShortCode,
        'PhoneNumber' => $partyA,
        'CallBackURL' => $callbackUrl,
        'AccountReference' => $accountReference,
        'TransactionDesc' => $transactionDesc,
    ];

    $response = Http::withHeaders($stkPushHeader)->post($processRequestUrl, $curlPostData);
   

    $responseData = $response->json();
    $checkoutRequestID = $responseData['CheckoutRequestID'];
    $responseCode = $responseData['ResponseCode'];

    if ($responseCode == "0") {
        // Store the $checkoutRequestID in the cache for 60 minutes (adjust as needed)
       
        Cache::put('checkoutRequestID', $checkoutRequestID, now()->addMinutes(30));

        return redirect()->route('success');
    } else {
        return view('failed', ['message' => 'Payment failed. Please try again.']);
    }
}

  
    public function handleCallback()
    {
        $checkoutRequestID = Cache::get('checkoutRequestID');
        $access_token = $this->getAccessToken();
    
        // Set API endpoint and credentials
        $queryUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $businessShortCode = '174379';
        $timestamp = now()->format('YmdHis');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $password = base64_encode($businessShortCode . $passkey . $timestamp);
    
        // Set headers and request payload
        $queryHeader = ['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $access_token];
        $curlPostData = [
            'BusinessShortCode' => $businessShortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'CheckoutRequestID' => $checkoutRequestID,
        ];
    
        $response = Http::withHeaders($queryHeader)->post($queryUrl, $curlPostData);
       
        $responseData = $response->json();
       
        
        if (isset($responseData['ResultCode'])) {
            $resultCode = $responseData['ResultCode'];
    
            // Process result codes and set appropriate messages
            switch ($resultCode) {
                case '1037':
                    $message = "Timeout in completing transaction";
                    break;
    
                case '1032':
                    $message = "Transaction cancelled by user";
                    $responseData =$response->json();
                    //Cache::put('responseData', $responseData, now()->addMinutes(30));
                    break;
    
                case '1':
                    $message = "Insufficient balance for the transaction";
                    break;
    
                case '0':
                    $message = "Transaction was successful";
                    //Cache::put('responseData', $responseData, now()->addMinutes(30));
                    break;
    
                default:
                    $message = "Unhandled ResultCode: $resultCode";
                    break;
            }
    
            // Return JSON response with resultCode and message
            return response()->json(['resultCode' => $resultCode, 'message' => $message, 'responseData' => $responseData]);
        }
    
        // Return a generic message if no ResultCode is found
        return response()->json(['message' => 'No ResultCode found in response.']);
    }
}
