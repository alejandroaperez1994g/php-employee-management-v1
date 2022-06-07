<?php
require('./loginManager.php');
require('./sessionHelper.php');




if ($_SERVER['REQUEST_METHOD'] === "POST") {
    authUser($_POST);
} else if ($_SERVER['REQUEST_METHOD'] === "LOGOUT") {
    automaticLogout();
} else {
    logout();
}
