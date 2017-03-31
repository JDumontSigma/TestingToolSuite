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
require('./php/partials/_account.php');

//bring in the login page
  echo '</main>';
echo '</div>';
//close the html off
require('./php/partials/static/end.php');

?>
