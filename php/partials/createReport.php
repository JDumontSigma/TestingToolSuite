<?php
require_once("./php/settings/db_connect.php");
//Gather the content regarding the team
$privileges  = "SELECT * FROM team WHERE team_group = 'UX'";
$projectLead = "";
$people      = "";

$result = mysqli_query($link, $privileges);
if ($result) {
    while ($data = mysqli_fetch_array($result)) {
        $projectLead .= '<option value="' . $data['name'] . '">' . $data['name'] . '</option>';

        $people .= '<input type="checkbox" id="' . $data['username'] . '" name="people" value="' . $data['name'] . '">';
        $people .= '<label for="' . $data['username'] . '">' . $data['name'] . '</label>';
    }
}

//Pull in the tests available
$possibleTests = "SELECT * FROM test";
$test          = "";

$result = mysqli_query($link, $possibleTests);
if ($result) {
    while ($data = mysqli_fetch_array($result)) {

        $test .= '<input type="checkbox" id="' . $data['name'] . '" name="test" value="' . $data['name'] . '">';
        $test .= '<label for="' . $data['name'] . '">' . $data['name'] . '</label>';
    }
}

?>

<section class="admin">
  <h3>Create new Report</h3>
  <section class="new">
    <h4>Create a new report</h4>
    <form action="./php/functions/SQL/_newMember.php" id="new_report" method="POST" class="personal_form">
      <legend>Title</legend>
        <input type="text" name="title" id="title" placeholder="Project Title" minlength=7 required>
      <legend>Project Lead</legend>
      <select id="lead" required="">
        <?php
          echo $projectLead;
        ?>
      </select>
      <legend>Start Date</legend>
        <input type="text" id="date" name="date" placeholder="YYYY/MM/DD" required>
      <legend>Duration</legend>
        <input type="number" id="duration" name="duration" placeholder="How many days" required min="1">
      <legend>Number of Participants</legend>
        <input type="number" id="participants" name="participants" placeholder="How many participants" required min="1">
      <legend>Tests included</legend>
        <?php
          echo $test;
        ?>
      <legend>People included</legend>
        <?php
          echo $people;
        ?>
      <button type="submit">Create new report</button>
    </form>
  </section>

</section>
