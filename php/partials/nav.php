<?php
require_once("./php/settings/db_connect.php");
$privileges = "SELECT * FROM team WHERE id = " . $_SESSION['user_id'];
$result     = mysqli_query($link, $privileges);
if ($result) {
    $data  = mysqli_fetch_array($result);
    $power = $data['power'];
    $name  = $data['name'];
    $job   = $data['job_role'];
    $img   = $data['profile_picture'];
}

function active($currect_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url       = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css
    }
}
?>

<nav role="navigation" id="navigation">
  <img  src="./assets/img/sigma-logo.svg" alt="" class="brand">
  <section class="profile">
    <h3>Welcome Back</h3>
    <img class="profileImg" src="./assets/img/<?php echo $img;?>" alt="">
    <?php
      echo '<h4>' . $name . '</h4>';
      echo '<h5>' . $job . '</h5>';
    ?>
  </section>


  <ul>
    <li class="<?php
active('dashboard.php');
?>"><a href="./dashboard.php"><i></i>Home</a></li>
    <li class="<?php active('dashboard.php?id=*');?>"><a href="./dashboard.php?id=<?php echo $data['name'];?>"><i></i>My Reports</a></li>
    <li class="<?php active('create.php');?>"><a href="./create.php"><i></i>Create New Report</a></li>
    <li class="<?php active('account.php'); ?>"><a href="./account.php"><i></i>Account Settings</a></li>
    <?php
      if ($power !== "researcher") {
    ?>
        <li class="<?php active('admin.php');?>"><a href="./admin.php"><i></i>Admin</a></li>
    <?php
      }
    ?>
    <li class="logout"><a href="./php/functions/_logout.php"><i></i>Logout</a></li>
  </ul>
</nav>
