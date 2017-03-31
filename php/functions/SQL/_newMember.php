<?php

require('../../settings/db_connect.php');
require('../_validation.php');
//To check and validate it
$errormsg        = "clean";
//Defaults for change later
$profile_picture = 'default.jpg';
$team_group      = 'UX';
$power           = 'researcher';

//Clean and tidy up the data!
$email    = clean_Data($_POST['email']);
$uname    = clean_Data($_POST['username']);
$password = clean_Data($_POST['password']);
$name     = clean_Data($_POST['name']);
$jr       = clean_Data($_POST['jr']);
//If any of these tests fail then the procedure goes to the catch method, this is a solid way of preventing incorrect fields being entered
try {
    //check that required fields are entered
    data_Empty($email, "email");
    data_Empty($uname, "username");
    data_Empty($password, "password");
    data_Empty($name, "name");
    data_Empty($jr, "jr");

    //check that elements are stringTest
    stringTester($jr);
    stringTester($name);
    stringTester($uname);

    //check emails
    validEmail($email);

    //Check the lengths
    //min lengths
    minTest($uname, 5);
    minTest($password, 4);
    minTest($name, 4);
    minTest($jr, 6);

    //set a max so the content is restricted somewhat
    maxTest($uname, 20);
    maxTest($password, 20);
    maxTest($name, 20);
    maxTest($jr, 20);

    //if everything is okay run this section of the test
    $password    = sha1($password);
    $insertQuery = "INSERT INTO `testing_tools`.`team` (`id`, `name`, `job_role`, `email`, `username`, `password`, `profile_picture`, `power`, `team_group`) VALUES (NULL, '$name', '$jr', '$email', '$uname', '$password', '$profile_picture', '$power', '$team_group')";
    if (mysqli_query($link, $insertQuery)) {
        //header('Refresh:3; url=http://localhost:8888/TestingTools/dashboard.php', true,303);
        echo "Success";
    } else {
        echo "There was an issue please try again";
    }
}
catch (Exception $e) {
    //delays the message for 3 seconds
    //then redirects back to the previous page
    header('Refresh:3; url=http://localhost:8888/TestingTools/admin.php', true, 303);
    //echo out the exception which was thrown
    echo $e->getMessage();

}

?>
