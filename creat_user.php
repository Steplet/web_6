<?php

// Заголовки
header("Access-Control-Allow-Origin: http://authentication-jwt/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once "./Database.php";
include_once "./User.php";


$database = new Database();
$db = $database->getConnection();


$user = new User($db);


$data = json_decode(file_get_contents("php://input"));


$user->name = $data->name;
$user->email = $data->email;
$user->password = $data->password;

$user->create();


