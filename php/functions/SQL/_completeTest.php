<?php
require('../../settings/db_connect.php');

//Take the post variables
$id = $_POST['test'];

//if there was not sent over JS take it from the URL
if (empty($id)) {
    $id = $_GET['id'];
}

//perform the query
$complete = "UPDATE `testing_tools`.`projects` SET `status` = '1' WHERE `projects`.`id` = " . $id;
//send a response
if (mysqli_query($link, $complete)) {
    //header('Refresh:3; url=http://localhost:8888/TestingTools/dashboard.php', true,303);
    echo "Success";
}
//close the database link
mysqli_close($link);
?>
