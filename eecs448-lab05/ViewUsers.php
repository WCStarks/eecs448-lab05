<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "wstarks050", "eiH7nahs", "wstarks050");

if ($mysqli->connect_errno) {
  echo "<p> Connect Failed. </p>";
  exit();
}

$query = "SELECT user_id FROM Users";
$result = $mysqli->query($query);

echo "<table style='border: 1px solid black'> <tr><th>Username</th></tr>";

while ($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row['user_id'] . "</td></tr>";
}

echo "</table>";

$result->free();
$mysqli->close();

?>
