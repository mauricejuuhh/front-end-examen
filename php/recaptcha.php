<?php
$api = isset($_POST['api'])? $_POST['api'] : null;
$recaptcha_api_uri = 'https://www.google.com/recaptcha/api/siteverify';
$_secret = '6Le-WlwUAAAAAE4-z-U91ErZUmLOYqnc9sM6wecj';
$data = array(
    'secret' => $_secret,
    'response' => $api,
    'remoteip' => $_SERVER['REMOTE_ADDR'],
);

$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, $recaptcha_api_uri);
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

    $rawResponse = curl_exec($verify);

   $apiResponse = json_decode($rawResponse, true);


    $api = array("api_res" => $apiResponse['success']);
    echo json_encode($api);
