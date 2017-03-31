<?php

require('../../settings/db_connect.php');
//get the test id
$test = $_POST['test'];

//gather all the info needed
$testInfo = "SELECT * FROM projects WHERE id = " . $test;
//perform query
$query = mysqli_query($link, $testInfo);
//pass it into an array
$testInfo = mysqli_fetch_array($query);
//add one to the max number of participants
$newParticipant = $testInfo['participants'] + 1;
//update the project table
$updateQuery = "UPDATE `testing_tools`.`projects` SET `participants` = '" . $newParticipant . "' WHERE `projects`.`id` =" . $test;
//insert the participant into the particiapnt table
$newParticipant = "INSERT INTO `testing_tools`.`participants` (`id`, `participant_id`, `test_id`, `sus_response`, `sus_score`, `sus_comp`, `prc_first`, `prc_second`, `prc_comp`) VALUES (NULL, '" . $newParticipant . "', '" . $test . "', '', '', '', '', '', '')";
//query
$insertParticipant = mysqli_query($link, $newParticipant);
//if succesful run this
if ($insertParticipant) {
    $update = mysqli_query($link, $updateQuery);
    if ($update) {
        echo "Success";
    } else {
        echo "There was a problem updating the test statistics";
    }
} else {
    echo "There was a problem updating the participant table";
}

?>
