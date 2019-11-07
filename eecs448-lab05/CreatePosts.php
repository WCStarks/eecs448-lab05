<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "wstarks050", "eiH7nahs", "wstarks050");

if ($mysqli->connect_errno) {
  echo "<p> Connect Failed. </p>";
  exit();
}
$user = $_POST['user'];
$post_content = $_POST['post_content'];
$mysqli->escape_string($user);
$mysqli->escape_string($post_content);

$query = "SELECT user_id FROM Users WHERE user_id='$user'";
$result = $mysqli->query($query);

if ($_POST['post_content'] == "") {
  echo "<p> Post not created because post field was empty.</p>";
}
else if ($result->num_rows == 0) {
  echo "<p> Post not create because user does not exist.</p>";
}
else {
  $query = "INSERT INTO Posts (content, author_id) VALUES ('$post_content' , '$user')";
  $mysqli->query($query);
  echo "<p> Post created successfully. </p>";
}

$result->free();
$mysqli->close();

?>
