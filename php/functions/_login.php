<?php
//Pull in other files which will be required throughout this login
require_once("_startSession.php"); // Start the session
require_once("../settings/db_connect.php"); //provide connection to the database
require_once("_validation.php"); //A file full of validation functions

// create an empty variable to contain any error messages
$error_msg = "";
// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_id'])) {
    // Grab the user-entered log-in data from the form, clean it up and put into  new variables to feed into your query below
    $user_name = clean_Data($_POST['username']);
    $password  = clean_Data($_POST['password']);
    //check to see that the inputs are not empty
    if (!empty($user_name) && !empty($password)) {
        //make sure both the password and username are appropriate lengths
        if (strlen($password) >= 4 && strlen($user_name) > 4) {
            //encrypt the password for searching the database
            $password = sha1($password);
            //generate a query string using the variables
            $query    = "SELECT id, name, username, password FROM team WHERE username = '$user_name' AND password = '$password'";
            //query the data into a variable
            $data     = mysqli_query($link, $query);
            //check to see if the is 1 row of data which matches
            if (mysqli_num_rows($data) == 1) {
                // The log-in is OK so set the user ID and user_name session vars (and cookies), and redirect to the home page
                $row = mysqli_fetch_array($data);
                //set cookies on the page
                setcookie('user_id', $row['id'], time() + (60 * 30), '/', NULL); // expires in 30 minutes
                setcookie('user_name', $row['username'], time() + (60 * 30), '/', NULL); // expires in 30 minutes
                setcookie('name', $row['name'], time() + (60 * 30), '/', NULL); // expires in 30 minutes
                //generate a session using the dame details
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['name']      = $row['name'];

                //generate a dynamic URL to send back with JS
                $log = 'http://' . $_SERVER['HTTP_HOST'] . '/TestingTools/dashboard.php';
                //this is a fallback incase JS is disabled
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/TestingTools/dashboard.php');
                //provide the log as a response
                echo $log;
            } else {
                // The username/password are incorrect so set an error message
                $error_msg = 'The username or password is incorrect';
                echo $error_msg;
            }
        } else {
            //log that the lengths are not appropriate
            echo "Your password and username must be atleast 5 characters";
        }
    } else {
        // The username/password weren't entered so set an error message;
        $error_msg = 'Please enter a username and password';
        echo $error_msg;
    }

}

?>
