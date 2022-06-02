<?php
require("./employeeManager.php");



if ($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['QUERY_STRING'] === 'add_player') {
    addPlayer($_POST);
}
