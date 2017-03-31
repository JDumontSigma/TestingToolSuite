<?php
require('../../settings/db_connect.php');
//get id from JS
$id      = $_POST['id'];
//if it still empty try getting it fromt he URL
if(empty($id)){
  $id = $_GET['id'];
}
//generate a query
$upgrade = "UPDATE `testing_tools`.`team` SET `power` = 'admin' WHERE `team`.`id` = " . $id;
//run it
if (mysqli_query($link, $upgrade)) {
  //header('Refresh:3; url=http://localhost:8888/TestingTools/dashboard.php', true,303);
  echo "success";
}

?>
