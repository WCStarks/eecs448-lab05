<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "wstarks050", "eiH7nahs", "wstarks050");

if ($mysqli->connect_errno) {
  echo "<p> Connect Failed. </p>";
  exit();
}
$user = $_POST['user'];
$mysqli->escape_string($user);

$query = "SELECT user_id FROM Users WHERE user_id='$user'";
$result = $mysqli->query($query);

if ($_POST['user'] == "") {
  echo "<p> User not created. An empty username was entered. </p>";
}
else if ($result->num_rows > 0) {
  echo "<p> User not created. Username already exists. </p>";
}
else {
  $query = "INSERT INTO Users (user_id) VALUES ('$user')";
  $mysqli->query($query);
  echo "<p> User created successfully. </p>";
}

$result->free();
$mysqli->close();

?>
