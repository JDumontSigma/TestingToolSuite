<?php
$results = '<section class="results">';
require_once("./php/settings/db_connect.php");

$test = $_GET['id'];

$testinfo = "SELECT * FROM projects WHERE id= " . $test;
$query    = mysqli_query($link, $testinfo);
$testinfo = mysqli_fetch_array($query);

$results .= '<h2>Display Results for: ' . $testinfo['title'] . '</h2>';
$results .= '<section class="details">';
$results .= '<ul>';
$results .= '<li>Project Lead: ' . $testinfo['project_lead'] . '</li>';
$results .= '<li>Project Start: ' . $testinfo['start_date'] . '</li>';
$results .= '<li>Number of Participants: ' . $testinfo['participants'] . '</li>';
$people     = explode(',', $testinfo['people_inc']);
$testPieces = explode(',', $testinfo['test_inc']);
$results .= '<li>People Included';
$results .= '<ul>';
foreach ($people as $person) {
    $results .= '<li>' . $person . '</li>';
}
$results .= '</ul>';
$results .= '</li>';
$results .= '<li>Tests Included: ';
$results .= '<ul>';
foreach ($testPieces as $element) {
    $results .= '<li>' . $element . '</li>';
}
$results .= '</ul>';
$results .= '</li>';
$results .= '</ul>';
$results .= '</section>';


$getParticipant = "SELECT * FROM participants WHERE test_id = " . $test;
$query          = mysqli_query($link, $getParticipant);


$susTotal = 0;


$prcWordStore = array();
$results .= '<table class="table table-striped">';
$results .= '<tr>';
$results .= '<th>Participant</th>';
for ($x = 1; $x < 11; $x++) {
    $results .= '<th>Q' . $x . '</th>';
}
$results .= '<th>Overall Score</th>';

$results .= '</tr>';

$counter = 1;
while ($data = mysqli_fetch_array($query)) {
    $results .= '<tr>';
    $answers = explode(',', $data['sus_response']);
    $results .= '<td>Participant ' . $counter . '</td>';
    foreach ($answers as $answer) {
        $results .= '<td>' . $answer . '</td>';
    }
    $results .= '<td>' . $data['sus_score'] . '</td>';
    $counter++;
    $results .= '</tr>';

    $words = explode(',', $data['prc_second']);

    foreach ($words as $word) {
        array_push($prcWordStore, $word);
    }

    $susTotal = $susTotal + $data['sus_score'];

}
$results .= '<tr>';
$sus = $susTotal / $testinfo['participants'];
$results .= '<td colspan="12" style="text-align:right">The average score is ' . $sus . '</td>';
$results .= '</tr>';
$results .= '</table>';

$countedArray = array_count_values($prcWordStore);

$results .= '<table class="table table-striped">';
$results .= '<thead>';
$results .= '<tr>';
$results .= '<th>Word</th>';
$results .= '<th>Chosen How Many Times</th>';
$results .= '</tr>';
$results .= '</thead>';
$results .= '<tbody>';
while ($word_name = current($countedArray)) {
    $results .= '<tr>';
    $results .= '<td>' . key($countedArray) . '</td>';
    $results .= '<td>' . $word_name . '</td>';
    $results .= '</tr>';
    //$results .= key($countedArray). $word_name .'<br />';
    next($countedArray);
}
$results .= '</tbody>';
$results .= '</table>';




$results .= '</section>';
echo $results;
?>
