<?php
$conn = mysqli_connect("localhost", "root", "", "crud");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// echo "<h2>Connection is made successfully</h2>";
?>
