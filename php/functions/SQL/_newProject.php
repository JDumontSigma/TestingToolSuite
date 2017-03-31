<?php

require('../../settings/db_connect.php');
require('../_participantTable.php');
require('../_validation.php');

$title        = clean_Data($_POST['title']);
$lead         = clean_Data($_POST['lead']);
$date         = clean_Data($_POST['date']);
$duration     = clean_Data($_POST['duration']);
$participants = clean_Data($_POST['participants']);
$test         = clean_Data($_POST['test']);
$people       = clean_Data($_POST['people']);

try{

  //check to see if they are empty
  data_Empty($title, "Project Title");

  data_Empty($lead, "Project Lead");
  data_Empty($date, "Date");
  data_Empty($duration, "Duration");
  data_Empty($participants, "Participants");
  data_Empty($test, "Tests");
  data_Empty($people, "people");
  //check if string

  stringTester($title);
  stringTester($lead);

  //check length
  minTest($title,7);


  //check it is a number
  number($duration);
  number($participants);

  //check min and max
  greaterThan($duration, 1);
  greaterThan($participants,1);

  $complete    = 0;
  $uniqueQuery = "SELECT * FROM projects WHERE title = '" . $title . "'";
  $results     = mysqli_query($link, $uniqueQuery);


  if (mysqli_num_rows($results) !== 0) {
      echo "Please enter a unique title";
  } else {
      $projectQuery = "INSERT INTO `testing_tools`.`projects` (`id`, `title`, `project_lead`, `start_date`, `duration`, `participants`, `complete_test`, `test_inc`, `people_inc`, `status`) VALUES (NULL, '$title', '$lead', '$date', '$duration', '$participants', '$complete', '$test', '$people', '0')";
      if (mysqli_query($link, $projectQuery)) {
          echo "Success";
          participantsInput($title, $participants, $link);
      } else {
          echo "Error";
      }
  }


}catch(Exception $e){
  header('Refresh:3; url=http://localhost:8888/TestingTools/create.php', true,303);
  echo $e->$getMessage();
}






?>
