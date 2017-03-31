<?php
require_once("./php/settings/db_connect.php");

$user = $_SESSION['user_id'];
$userInfo = "SELECT * FROM team WHERE id =" . $user;

$query = mysqli_query($link,$userInfo);
$user = mysqli_fetch_array($query);

$account = '<section class="account">';
  $account .= '<h3>My Account</h3>';
  $account .= '<section class="personal">';
    $account .= '<form action="./php/functions/SQL/_personalUpdate.php" class="personal_form" method="post" enctype="multipart/form-data" id="personal_form">';
      $account .= '<legend>Account Personalisation</legend>';
      $account .= '<input type="hidden" id="id" name="id" value="' . $user['id'] . '">';
      $account .= '<legend>Profile Picture</legend>';
      $account .= '<input type="file" id="fileToUpload" name="fileToUpload">';
      $account .= '<legend>Name</legend>';
      $account .= '<input type="text" id="name" name="name" value="' . $user['name'] . '" placeholder="Please enter a name" required minlength="4">';
      $account .= '<legend>Job Role</legend>';
      $account .= '<input type="text" id="jr" name="jr" placeholder="Please enter a job role" value="' . $user['job_role'] . '" required minlength="6">';
      $account .= '<button class="update" type="Submit">Update Peronsal Information</button>';
    $account .= '</form>';
  $account .= '</section>';
  $account .= '<section class="security">';
    $account .= '<form action="./php/functions/SQL/_securityUpdate.php" method="POST" id="security_form" class="security_form">';
      $account .= '<legend>Account Security</legend>';
      $account .= '<input type="hidden" id="id" name="id" value="' . $user['id'] . '">';
      $account .= '<legend>Email</legend>';
      $account .= '<input type="email" id="email" name="email" placeholder="Please enter an email" value="' . $user['email'] . '" required>';
      $account .= '<legend>Username</legend>';
      $account .= '<input type="text" id="uname" name="uname" placeholder="Please enter a username" value="' . $user['username'] . '" required minlength="5">';
      $account .= '<legend>Password</legend>';
      $account .= '<label>Current Password</label>';
      $account .= '<input type="password" id="pword" name="pword" placeholder="Please enter your current password" required minlength="4">';
      $account .= '<label>New Password</label>';
      $account .= '<input type="password" id="npword" name="npword" placeholder="Please enter your new password" required minlength="4">';
      $account .= '<label>Confirm New Password</label>';
      $account .= '<input type="password" id="cpword" name="cpword" placeholder="Confirm new password" required minlength="4">';
      $account .= '<button class="update" type="submit">Update Account Information</button>';
    $account .= '</form>';
  $account .= '</section>';
$account .= '</section>';

mysqli_close($link);


echo $account;
?>
