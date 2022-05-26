<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once $path . '/api/models/Token.php';

$token = new Token();

$history = $token->history();

header("Content-Type: application/json");
http_response_code(200);
echo json_encode($history);
