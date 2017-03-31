<?php

function prcWords($link, $test)
{
    $stage  = $_GET['stage'];
    $testID = $test;

    $qString = '<h4>PRC Words</h4>';
    $qString .= ' <p>For Participant ' . $_GET['participant'] . '</p>';

    if ($stage === null) {
        $title  = "SELECT * FROM test WHERE name = 'PRC'";
        $query  = mysqli_query($link, $title);
        $result = mysqli_fetch_array($query);
        $words  = explode(',', $result['content']);
        shuffle($words);
        $qString .= '<form class="prc" action="./php/functions/SQL/_uploadPRC.php" id="first" method="POST">';
        $qString .= '<input type="hidden" name="test" id="testID" value="' . $test . '">';
        $qString .= '<input type="hidden" name= "participant" id="participant" value="' . $_GET['participant'] . '">';
        $qString .= '<input type="hidden" id="stage" value="0" name="stage">';
        $qString .= '<input type="hidden" id="selected" name="selected">';
        foreach ($words as $word) {
            $qString .= '<input type="checkbox" name="prc[]" id="' . $word . '" value="' . $word . '">';
            $qString .= '<label for="' . $word . '">' . $word . '</label>';
        }
        $qString .= '<button type="submit" value="Submit PRC">Submit PRC</button>';
        $qString .= '</form>';
        echo $qString;
    } else {
        $title  = "SELECT * FROM participants WHERE participant_id = " . $_GET['participant'] . " AND test_id = " . $test;
        $query  = mysqli_query($link, $title);
        $result = mysqli_fetch_array($query);
        $words  = explode(',', $result['prc_first']);
        shuffle($words);
        $qString .= '<form class="prc" action="./php/functions/SQL/_uploadPRC.php" id="second" method="POST">';
        $qString .= '<input type="hidden" name="test" id="testID" value="' . $test . '">';
        $qString .= '<input type="hidden" name="participant" id="participant" value="' . $_GET['participant'] . '">';
        $qString .= '<input type="hidden" id="stage" value="1" name="stage">';
        $qString .= '<input type="hidden" id="selected" name="selected">';
        foreach ($words as $word) {
            $qString .= '<input type="checkbox" name="prc[]" id="' . $word . '" value="' . $word . '">';
            $qString .= '<label for="' . $word . '">' . $word . '</label>';
        }
        $qString .= '<button type="submit" value="Submit PRC">Submit PRC</button>';
        $qString .= '</form>';
        echo $qString;
    }

}


?>
