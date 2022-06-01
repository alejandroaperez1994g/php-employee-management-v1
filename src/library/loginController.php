<?php
require('./loginManager.php');



// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    authUser($_POST);
} else {
    logout();
}
