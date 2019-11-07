<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "wstarks050", "eiH7nahs", "wstarks050");

if ($mysqli->connect_errno) {
  echo "<p> Connect Failed. </p>";
  exit();
}

$post = $_POST['posts'];
if(empty($post)) {
  echo "No posts chosen for deletion.";
}
else {
  $N = count($post);
  for ($i = 0; $i < $N; $i++) {
    if ($post[$i]) {
      $id = $post[$i];
      $mysqli->escape_string($id);
      $query = "DELETE FROM Posts WHERE post_id = '$id'";
      $mysqli->query($query);
      echo "Post id " . $id . " deleted.<br>";
    }
  }
}

$result->free();
$mysqli->close();

?>
