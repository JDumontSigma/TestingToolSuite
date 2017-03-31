<?php


function participantsInput($title, $number, $link)
{
    //retrieve the test id
    $test   = "SELECT * FROM projects WHERE title = " . "'" . $title . "'";
    $result = mysqli_query($link, $test);
    $data   = mysqli_fetch_array($result);
    for ($x = 1; $x <= $number; $x++) {
        $newParticipant = "INSERT INTO `testing_tools`.`participants` (`id`, `participant_id`, `test_id`, `sus_response`, `sus_score`, `sus_comp`, `prc_first`, `prc_second`, `prc_comp`) VALUES (NULL, '" . $x . "', '" . $data['id'] . "', '', '', '', '', '', '')";
        $input          = mysqli_query($link, $newParticipant);
    }

}
?>
