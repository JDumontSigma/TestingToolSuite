<?php


function greaterThan($number,$min){
  if($number < $min){
    throw new Exception($number . ' must be larger than ' . $min);
  }
}

function number($number){
  if(!is_numeric($number)){
    throw new Exception($number . ' is not a number');
  }
}

function stringTest($string){
  if(!is_string($string)){
    throw new Exception($string . ' is not a valid input, please enter a string');
  }
}

function emptyTest($variable,$field){
  if(empty($variable)){
    throw new Exception('Please make sure you fill in the ' . $field . ' field');
  }
}

function lengthTest($string,$minLength){
  if(strlen($string) < $minLength){
    throw new Exception('Please enter a string longer than ' . $minLength . ' characters');
  }
}

function validEmail($email){
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    throw new Exception($email . ' is not a valid email');
  }
}

$test = "Hello@hello.com";

try{
  validEmail($test);

  echo "Everything worked fine so we do this!";
}catch(Exception $e){
  echo $e->getMessage();
}

 ?>
