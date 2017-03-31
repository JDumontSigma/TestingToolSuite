<?php

require('../../settings/db_connect.php');

$test        = $_POST['test'];
$participant = $_POST['part'];
$prc         = $_POST['checked'];
$stage       = (string)$_POST['stage'];
//check to see if JS is running and filled variables
if(empty($participant)){
  $participant = $_POST['participant'];
}
//loop through the array to push it into an actual array
if(empty($prc)){
  $prcTemp = $_POST['prc'];
  for($x = 0; $x<count($prcTemp); $x++){
    if($x === 0){
      $prc = $prcTemp[$x];
    }else{
      $prc .= ',' . $prcTemp[$x];
    }
  }
}else{
  $prcTemp = $prc;
  for($x = 0; $x<count($prcTemp); $x++){
    if($x === 0){
      $prc = $prcTemp[$x];
    }else{
      $prc .= ',' . $prcTemp[$x];
    }
  }
}


try{
  //allow the count function to validate
  $words = explode(',', $prc);

  if(count($words) < 5){
    throw new Exception('Please make sure to choose atleast 5 words');
  }

//if stage one update the test
  if ($stage === '0') {
      $update       = "UPDATE `testing_tools`.`participants` SET `prc_first` = '" . $prc . "' WHERE `participants`.`participant_id` = " . $participant . " AND `participants`.`test_id` = " . $test;
      $update_query = mysqli_query($link, $update);

      if ($update_query) {
          header('Refresh:0; url=http://localhost:8888/TestingTools/prc.php?stage=1&id=' . $test . '&participant=' . $participant, true,303);
          echo "Success";
      } else {
          echo "fail";
      }
  }
//repeat for stage two
  if ($stage !== '0') {
      $update       = "UPDATE `testing_tools`.`participants` SET `prc_second` = '" . $prc . "', prc_comp = 1 WHERE `participants`.`participant_id` = " . $participant . " AND `participants`.`test_id` = " . $test;
      $update_query = mysqli_query($link, $update);
      if ($update_query) {
          header('Refresh:0; url=http://localhost:8888/TestingTools/participants.php?id=' . $test, true,303);
          echo "Success";
      } else {
          echo "fail";
      }
  }



}catch(Exception $e){
  echo $e->$getMessage();
}




?>
