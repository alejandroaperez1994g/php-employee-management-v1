<?php

session_start();

//* function that validate the user email  and password
function validateUser($email, $password)
{
    // Read the JSON file 
    $userJSON = file_get_contents('../../resources/users.json');

    // Decode the JSON file
    $jsonData = json_decode($userJSON, true);


    if ($email === $jsonData['users'][0]["email"] && password_verify($password, $jsonData['users'][0]["password"])) {
        $_SESSION['useremail'] = $email;
        $_SESSION['password'] = $password;
        header("Location: ../../assets/html/dashboard-info.html");
    } else {
        header("Location: ../../index.php?auth_error");
    }
}
//* function that autenticate de user
function authUser($post)
{

    $userEmail = $post['email'];
    $userPassword = $post['password'];

    validateUser($userEmail, $userPassword);
}
