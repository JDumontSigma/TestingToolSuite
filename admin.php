<?php
//calls the head of the document
require('./php/partials/kickout.php');
//calls the head of the document
require('./php/partials/static/head.php');
//bring in the login page
require('./php/partials/nav.php');
//bring in the login page
echo '<div class="main" id="main" role="main">';
  echo '<main>';
require('./php/partials/static/search.php');
//bring in the login page
require('./php/partials/admin.php');
  echo '</main>';
echo '</div>';
//bring in the login page
require('./php/partials/static/footer.php');
//close the html off
require('./php/partials/static/end.php');

?>
