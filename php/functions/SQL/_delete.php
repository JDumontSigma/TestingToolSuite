<?php
require('../../settings/db_connect.php');
//get id from a js post
$id = $_POST['id'];
//if it didnt come from js take form url
if (empty($id)) {
    $id = $_GET['id'];
}
//generate query
$delete = "DELETE FROM `testing_tools`.`team` WHERE `team`.`id` = " . $id;
//execute query
if (mysqli_query($link, $delete)) {
    //header('Refresh:3; url=http://localhost:8888/TestingTools/dashboard.php', true,303);
    echo "success";
}
//close database
mysqli_close($link);
?>
