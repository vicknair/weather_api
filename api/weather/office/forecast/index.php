<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/api/models/Token.php';
$headers = function_exists('getallheaders') ? array_change_key_case(getallheaders(), CASE_LOWER) : [];
$valid_token = false;
if (isset($headers['api-token'])) {
    $api_token = $headers['api-token'];
    $token = new Token();
    $valid_token = $token->authenticate($api_token); //echo $valid_token; die;
}

if (!$valid_token) {
    http_response_code(401);
} else {
    get_forecast();
}



function get_forecast() {
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/api/models/Forecast.php';

    $forecast = new Forecast();
    $weather = $forecast->get();
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($weather);
}
