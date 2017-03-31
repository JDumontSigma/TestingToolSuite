<?php
//helps clean the data of potentially malicious code
function clean_Data($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function data_Empty($data,$field){
  if(empty($data)){
    throw new Exception('Please fill in the required fields');
  }
}


function unique($field, $input){
  //require('../../settings/db_connect.php');
  $query = "SELECT * FROM team WHERE " . $field . " = '" . $input ."'";
  $result = mysqli_query($link,$query);
  if(mysqli_num_rows($result) !== 0){
    throw new Exception('Your inputs are not unique, please try again');
  }
}

function greaterThan($number,$min){
  if($number < $min){
    throw new Exception('Please make sure that the inputs are within the specified range');
  }
}

function lessThan($number,$max){
  if($number < $max){
    throw new Exception('Please make sure that the inputs are within the specified range');
  }
}

function number($number){
  if(!is_numeric($number)){
    throw new Exception('Please ensure you are using the write data format');
  }
}

function stringTester($string){
  if(!is_string($string)){
    throw new Exception('Please ensure you are using the write data format');
  }
}

function minTest($string,$minLength){
  if(strlen($string) < $minLength){
    throw new Exception('Please enter a string longer than the minimum characters');
  }
}

function maxTest($string,$minLength){
   if(strlen($string) > $minLength){
    throw new Exception('Please enter a string less than maximum characters');

  }
}

function validEmail($email){
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    throw new Exception('This is not a valid email');
  }
}
 ?>
