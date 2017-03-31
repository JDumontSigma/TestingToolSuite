<?php
require('../../settings/db_connect.php');
$test        = $_POST['test'];
$participant = $_POST['part'];
$sus         = $_POST['checked'];
//if the request has not been sent through using JS
//take that values an alternative way
if(empty($participant)){
  $participant = $_POST['participant'];
}
//loop through each of the checkboxes if the submission was not through jquery
if(empty($sus)){
  for($x = 1; $x < 11; $x++){
    if($x === 1){
      $sus = $_POST['Q' . $x];
    }else{
      $sus .= ',' . $_POST['Q' . $x];
    }
  }
}

$sus_broken  = explode(',', $sus);

try{

  //make sure that atleast 10 answers have been submitted
  if(count($sus_broken) < 10){
    throw new Exception('Please make sure you select an option for each question');
  }

  $calculation = (($sus_broken[0] - 1) + (5 - $sus_broken[1]) + ($sus_broken[2] - 1) + (5 - $sus_broken[3]) + ($sus_broken[4] - 1) + (5 - $sus_broken[5]) + ($sus_broken[6] - 1) + (5 - $sus_broken[7]) + ($sus_broken[8] - 1) + (5 - $sus_broken[9])) * 2.5;

  $update       = "UPDATE `testing_tools`.`participants` SET `sus_response` = '" . $sus . "', `sus_score` = '" . $calculation . "', `sus_comp` = '1' WHERE `participants`.`participant_id` = " . $participant . " AND `participants`.`test_id` = " . $test;
  $update_query = mysqli_query($link, $update);

  if ($update_query) {
      //header('Refresh:3; url=http://localhost:8888/TestingTools/participants.php?id=' . $test, true,303);
      echo "Success";
  } else {
      echo "fail";
  }

}catch(Exception $e){
  echo $e->$getMessage();
}






?>
