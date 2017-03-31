<?php
require_once("./php/functions/_startSession.php");
 if (!isset($_SESSION['user_id'])) {
   header( 'Location: http://' . $_SERVER['HTTP_HOST'] . '/TestingTools/index.php' );
 }
?>
