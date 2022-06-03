<?php
require("./employeeManager.php");


if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['QUERY_STRING'] === 'add_player') {
    addPlayer($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] === "DELETE") {

    $data = json_decode(file_get_contents("php://input"), true);
    deletePlayer($data);
}
