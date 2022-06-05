<?php
require("./employeeManager.php");
session_start();


if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['QUERY_STRING'] === 'add_player') {
    if ($_POST["id"] > 0) {
        updatePlayer($_POST);
    } else {
        addPlayer($_POST, $_FILES);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);
    deletePlayer($data);
} elseif ($_SERVER['REQUEST_METHOD'] === "INFO") {
    $data = json_decode(file_get_contents("php://input"), true);
    $playerInfo = findUser($data['id']);
    $json = json_encode($playerInfo);
    echo $json;
} elseif ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['QUERY_STRING'] === 'all_data') {
    $data  = getAllData();
    $json = json_encode($data);
    echo $json;
}
