<?php
// For connection
$conn = mysqli_connect("localhost","root","","reminder");
// To Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
