<?php
require('./loginManager.php');



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    authUser($_POST);
}
