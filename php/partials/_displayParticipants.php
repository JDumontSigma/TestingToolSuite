<?php

function displayPeople($link, $testID)
{
    //get the project title
    $title  = "SELECT * FROM projects WHERE id =" . $testID;
    $query  = mysqli_query($link, $title);
    $title  = mysqli_fetch_array($query);
    $number = $title['participants'];
    $title  = $title['title'];

    $participant = '<h3>Participants for: ' . $title . '</h3>';

    $completed   = 0;
    //Get the partiipants relevant
    $gather      = "SELECT * FROM participants WHERE test_id = " . $testID;
    $gatherQuery = mysqli_query($link, $gather);
    $participant .= '<section id="' . $testID . '" class="add col-lg-3 col-md-5 col-sm-6 col-xs-12">';
    $participant .= '<p>Add a new participant</p>';
    $participant .= '<i class="fa fa-plus" aria-hidden="true"></i>';
    $participant .= '</section>';
    while ($data = mysqli_fetch_array($gatherQuery)) {
        ;
        $participant .= '<section class="person col-lg-3 col-md-5 col-sm-6 col-xs-12" >';
        $participant .= '<h4>Participant ' . $data['participant_id'] . '</h4>';
        if (($data['sus_comp'] === '1') && ($data['prc_comp'] === '1')) {
            $completed++;
        }
        if ($data['prc_comp'] === '1') {
            $participant .= '<a href="./prc.php?id=' . $testID . '&participant=' . $data['participant_id'] . '" class="complete col-sm-6">PRC</a>';
        } else {
            $participant .= '<a href="./prc.php?id=' . $testID . '&participant=' . $data['participant_id'] . '" class="col-sm-6">PRC</a>';
        }
        if ($data['sus_comp'] === '1') {
            $participant .= '<a href="./sus.php?id=' . $testID . '&participant=' . $data['participant_id'] . '" class="complete col-sm-6">SUS</a>';
        } else {
            $participant .= '<a href="./sus.php?id=' . $testID . '&participant=' . $data['participant_id'] . '" class="col-sm-6">SUS</a>';
        }
        $participant .= '</section>';
    }
    if ((string) $completed === $number) {
        $participant .= '<section class="projectComplete">';
          $participant .= '<a href="./php/functions/SQL/_completeTest.php" id="' . $testID . '">Complete the project</a>';
        $participant .= '</section>';
    }
    echo $participant;


}

?>
