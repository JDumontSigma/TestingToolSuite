<?php

//This keeps a user logged in across pages
session_start();
// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user_id'])) {
    //check to see if the cookies are set to gather information
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_name']) && isset($_COOKIE['name'])) {
        //set the session details to the same values as the cookies
        $_SESSION['user_id']   = $_COOKIE['user_id'];
        $_SESSION['user_name'] = $_COOKIE['user_name'];
        $_SESSION['name']      = $_COOKIE['name'];
    }
}

?>
