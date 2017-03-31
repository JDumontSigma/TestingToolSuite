<?php
require_once("../../settings/db_connect.php"); //provide connection to the database
require_once("../_validation.php"); //A file full of validation functions

$name = clean_Data($_POST['name']);
$jr   = clean_Data($_POST['jr']);
$img  = $_FILES["fileToUpload"]["name"];
$id   = $_POST['id'];


try{
  data_Empty($name,"Name");
  data_Empty($jr,"Job Role");

  //Check the length of the string
  minTest($name,4);
  mintest($jr,6);

  //sets a suitable limit onto the string
  maxTest($name,20);
  maxTest($jr,20);

  //if all the code is valid run the image checker
  //if no image has been uploaded then we will not change it
  if (empty($img)) {
      $update = "UPDATE `testing_tools`.`team` SET `name` = '" . $name . "', `job_role` = '" . $jr . "' WHERE `team`.`id` = " . $id;
      $query  = mysqli_query($link, $update);
      if ($query) {
          header('Refresh:0; url=http://localhost:8888/TestingTools/account.php', true,303);
          echo "Successful change!";
      }
      //if there is an image included perform checks and alter the upload
  } else {
      $target_dir    = "../../../assets/img/";
      $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk      = 1;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if ($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          echo "Sorry, only JPG, JPEG, PNG files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $update = "UPDATE `testing_tools`.`team` SET `name` = '" . $name . "', `job_role` = '" . $jr . "', `profile_picture` = '" . $_FILES["fileToUpload"]["name"] . "' WHERE `team`.`id` =" . $id;
              echo $update;
              $query = mysqli_query($link, $update);
              if ($query) {
                  echo "Updated";
              } else {
                  echo "there was a problem updating!";
              }

              //Success in uploading the image, now check the other fields
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
  }

}catch(Exception $e){
  header('Refresh:3; url=http://localhost:8888/TestingTools/account.php', true,303);
  echo $e->$getMessage();
}





?>
