<?php
function sendSMS($phoneNumber) {
    $url = 'https://w1e3ed.api.infobip.com/sms/2/text/advanced';

    // Prepare the request body
    $data = array(
        'messages' => array(
            array(
                'destinations' => array(array('to' => $phoneNumber)),
                'from' => 'ServiceSMS',
                'text' => 'Notification: Une personne a rejoint.'
            )
        )
    );
    $dataJson = json_encode($data);

    // Set headers
    $headers = array(
        'Content-Type: application/json',
        'Authorization: App 963b96b6382c85fa7bfa77343f9b9a5d-05144f00-88ef-4470-a4dd-9ef125f003fa',
        'Accept: application/json'
    );

    // Set options for the POST request
    $options = array(
        'http' => array(
            'header' => $headers,
            'method' => 'POST',
            'content' => $dataJson,
            'ignore_errors' => true // Ignore HTTP errors to handle them manually
        )
    );

    // Create a context for the POST request
    $context = stream_context_create($options);

    // Send the POST request and get the response
    $response = file_get_contents($url, false, $context);

    // Check if the response is received successfully
    if ($response === false) {
        echo 'Erreur lors de l\'envoi de la notification SMS.';
    } else {
        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Check the HTTP status code
        if (isset($http_response_header)) {
            $status = explode(' ', $http_response_header[0])[1];
            if ($status == '200') {
                echo 'Notification SMS envoyée avec succès.';
            } else {
                echo 'Erreur lors de l\'envoi de la notification SMS: ' . $status;
            }
        }
    }
}

?>
