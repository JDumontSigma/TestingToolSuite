<?php
//calls the head of the document
require('./php/partials/kickout.php');
//calls the head of the document
require('./php/partials/static/head.php');
//bring in the login page
require('./php/partials/nav.php');
echo '<div class="main" id="main" role="main">';
  echo '<main>';
require('./php/partials/static/search.php');
//bring in the login page
require_once("./php/settings/db_connect.php");
require('./php/partials/dashboard.php');
$search = $_GET['search'];

if(empty($search)){

  echo '<section class="projects">';
    echo '<h3>Active Projects</h3>';
    project('Active',$link);
  echo '</section>';
  echo '<section class="projects_completed">';
    echo '<h3>Completed Projects</h3>';
    project('Complete',$link);
  echo '</section>';
  mysqli_close($link);

}else{
  echo '<section class="projects">';
    echo '<h3>Active Projects</h3>';
    projectSearch('Active',$link,$search);
  echo '</section>';
  echo '<section class="projects_completed">';
    echo '<h3>Completed Projects</h3>';
    projectSearch('Complete',$link,$search);
  echo '</section>';
  mysqli_close($link);
}


  echo '</main>';
echo '</div>';
require('./php/partials/static/footer.php');
//close the html off
require('./php/partials/static/end.php');

?>
