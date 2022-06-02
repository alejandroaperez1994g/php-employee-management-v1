<?php
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
    } elseif (isset($get['player_added_successfully'])) {
        echo '<div class="alert alert-success" role="alert">
        Player added successfully.
        </div>';
    } elseif (isset($get['error'])) {
        echo '<div class="alert alert-danger" role="alert">
        Something went wrong.
        </div>';
    }
}
