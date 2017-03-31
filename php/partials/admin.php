<section class="admin">
  <h3>Admin Control Panel</h3>
  <section class="new">
    <h4>Create a new user</h4>
    <form id="new_user" action="./php/functions/SQL/_newMember.php" method="POST" class="personal_form">
      <legend>Email</legend>
        <input type="email" name="email" id="email" placeholder="Email" required>
      <legend>Username</legend>
        <input type="text" id="username" name="username" placeholder="Username" required minlength="5">
      <legend>Password</legend>
        <input type="password" id="password" name="password" placeholder="Password" required minlength="4">
      <legend>Name</legend>
        <input type="text" id="name" name="name" placeholder="name" required minlength="4">
      <legend>Job Role</legend>
        <input type="text" id="jr" name="jr" placeholder="Jobrole" required minlength="6">
        <button class="newUser" type="submit">Create new user</button>
    </form>
  </section>
  <section class="current">
      <h4>Current users</h4>
<?php
require_once("./php/settings/db_connect.php");

$currentUser = $_SESSION['user_id'];
$query       = "SELECT * FROM team";
$data        = mysqli_query($link, $query);
if (mysqli_num_rows($data) > 1) {
    echo '<ul>';
    while ($row = mysqli_fetch_array($data)) {
        if ($row['id'] !== $currentUser) {
            echo '<li>';
            echo '<p>' . $row['name'] . '</p>';
            if ($row['power'] === 'researcher') {
                echo '<a class="upgradeUser" href="./php/functions/SQL/_upgrade.php?id=' . $row['id'] . '" id="' . $row['id'] . '">Upgrade</a>';
            }
            if ($row['power'] !== 'super') {
                echo '<a class="deleteUser" href="./php/functions/SQL/_delete.php?id=' . $row['id'] . '" id="' . $row['id'] . '">Delete</a>';
            }
            echo '</li>';
        }
    }
    echo '</ul>';
} else {
    echo "<h3>There are no other users!</h3>";
}

mysqli_close($link);
?>
  </section>

</section>
