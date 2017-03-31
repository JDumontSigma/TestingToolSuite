<?php
require_once("../../settings/db_connect.php"); //provide connection to the database
require_once("../_validation.php"); //A file full of validation functions

$id    = $_POST['id'];

//Clean the data from malicious inputs
$email = clean_Data($_POST['email']);
$uname = clean_Data($_POST['uname']);

$password = clean_Data($_POST['pword']);
$npword   = clean_Data($_POST['npword']);
$cpword   = clean_Data($_POST['cpword']);


try{

  //check the fields are filled in
  //only need to check the top two as the password potentiall will not change
  data_Empty($email,"Email");
  data_Empty($uname,"Username");

  //check email
  validEmail($email);

  //check the lengths
  minTest($uname,5);


  if (empty($password)) {
      $update = "UPDATE `testing_tools`.`team` SET `email` = '" . $email . "', `username` = '" . $uname . "' WHERE `team`.`id` = " . $id;
      $query  = mysqli_query($link, $update);
      if ($query) {
          echo "Successful update";
      } else {
          echo "Something went wrong!";
      }
  } else {

      //make sure the new passwords have been entered
      data_Empty($npword);
      data_Empty($cpword);

      //check the lengths
      minTest($pword,4);
      minTest($npword,4);
      minTest($cpword,4);

      //check the new passwords match match
      if($npword !== $cpword){
        throw new Exception('Please make sure your new passwords match');
      }

      //if everything is okay then process with this
      $password = sha1($password);
      $check    = "SELECT * FROM team WHERE username = '" . $uname . "' AND password = '" . $password . "'";
      $query    = mysqli_query($link, $check);

      if (mysqli_num_rows($query) !== 1) {
          throw new Exception('There was an error retrieving your information from the database');
      } else {
          if ($npword === $cpword) {
              $npword = sha1($npword);
              $query  = "UPDATE `testing_tools`.`team` SET `email` = '" . $email . "', `username` = '" . $uname . "', `password` = '" . $npword . "' WHERE `team`.`id` = " . $id;

              $update = mysqli_query($link, $query);

              if ($update) {
                  echo "New password set";
              } else {
                  echo 'there was an issue';
              }
          } else {
                throw new Exception('Please make sure the passwords match');
        }
      }
      echo "Updating password";
  }


}catch(Exception $e){
  header('Refresh:3; url=http://localhost:8888/TestingTools/account.php', true,303);
  echo $e->$getMesage();
}






?>
