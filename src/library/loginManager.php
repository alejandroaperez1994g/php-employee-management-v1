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
//* function that check $_GET super variable,depending on the url it returns one message or another
function checkUrl($get)
{
    if (isset($get['auth_error'])) {
        echo '<div class="alert alert-danger" role="alert">
        This email or password is incorrect.
      </div>';
    } elseif (isset($get['logout'])) {
        echo '<div class="alert alert-success" role="alert">
        You have been successfully logged out.
      </div>';
    } elseif (isset($get['invalid_permission'])) {
        echo '<div class="alert alert-danger" role="alert">
        You do not have permission to access this page.
      </div>';
    }
}
//* function that logout the user, unset $_SESSION, destroy cookies and redirects to login page
function logout()
{
    unset($_SESSION);
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    header("Location: ../../index.php?logout");
}
