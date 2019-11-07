<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "wstarks050", "eiH7nahs", "wstarks050");

if ($mysqli->connect_errno) {
  echo "<p> Connect Failed. </p>";
  exit();
}
$user = $_POST['user'];
$mysqli->escape_string($user);

$query = "SELECT post_id, content FROM Posts WHERE author_id = '$user'";
$result = $mysqli->query($query);
echo "Posts by " . $user . ":<br><br>";

echo "<table>";
echo "<tr><th>Post ID</th><th>Post Content</th></tr>";


while ($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row['post_id'] . "</td>";
  echo "<td>" . $row['content'] . "</td></tr>";
}

echo "</table>";

$result->free();
$mysqli->close();

?>
