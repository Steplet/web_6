<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "./Database.php";
include_once "./User.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $res = $user->showAll();
    $counter = $res->rowCount();

    if ($counter > 0) {

        $users = array();

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            array_push($users, array('id' => $id, 'name' => $name, 'email' => $email, 'password' => $password));
        }
    }
}