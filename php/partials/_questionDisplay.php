<?php

function susQuestion($link, $test)
{

    $title     = "SELECT * FROM test WHERE name = 'SUS'";
    $query     = mysqli_query($link, $title);
    $result    = mysqli_fetch_array($query);
    $questions = explode(';', $result['content']);
    $qString   = '<h4>Questions</h4>';
    $qString .= ' <p>For Participant ' . $_GET['participant'] . '</p>';
    $counter = 1;
    $qString .= '<form action="./php/functions/SQL/_uploadSUS.php" id="sus" method="POST">';
    $qString .= '<input type="hidden" name="participant" id="participant" value="' . $_GET['participant'] . '">';
    $qString .= '<input type="hidden" name="test" id="test" value="' . $test . '">';

    foreach ($questions as $question) {
        $qString .= '<section class="question">';
        $qString .= '<p>' . $question . '</p>';
        for ($l = 0; $l < 5; $l++) {
            $qString .= '<input type="radio" id="Q' . $counter . '_' . $l . '"name="Q' . $counter . '" value="' . $l . '">';
            $qString .= '<label for="Q' . $counter . '_' .  $l. '">' . ($l + 1) . '</label>';
        }
        $qString .= '</section>';
        $counter++;
    }
    $qString .= '<button type="submit" value="Submit SUS">Submit SUS</button>';
    $qString .= '</form>';

    echo $qString;

}


?>
