<?php
//pull in the database details
require("db_config.php");
//initiallise the request
$link    = mysqli_init();
//try to connect to the database
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port);

//if there is succes do nothing, perform the pother tasks this will be used with
if ($success) {
  //else alert that there was a problem
} else {
    echo "There was a problem connecting!";
}

?>
