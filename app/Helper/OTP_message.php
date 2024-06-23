<?php

      function sendSmsAndRedirect($mobile, $message)
    {
        
        $apiKey = '8PJkEksujUifEWVi4azGXA';
        $senderId = 'SSEPLB';
        $route = '08';

        $content = http_build_query([
            'apikey' => $apiKey,
            'senderid' => $senderId,
            'channel' => 'trans',
            'DCS' => 0,
            'flashsms' => 0,
            'number' => $mobile,
            'text' => $message,
            // 'route' => $route,
        ]);

        $apiUrl = 'http://182.18.162.128/api/mt/SendSMS?' . $content;

        $ch = curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Optional: set a timeout
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'cURL error: ' . curl_error($ch);
        } else {

            $responseDecoded = json_decode($response, true);
            if (isset($responseDecoded['ErrorCode']) && $responseDecoded['ErrorCode'] === '000') {
                return redirect()->route('front.thanku')->with('message', 'Thank You For Visiting Our Campus');

            }
            $responseDecoded = json_decode($response, true);
            if (isset($responseDecoded['ErrorCode']) && $responseDecoded['ErrorCode'] === '000') {
            } else {
                // Handle other error codes here
                return  $responseDecoded; // Example: Return error message
            }
        }
    }

