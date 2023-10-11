<?php
session_start();
include "connect.php";
$id=$_GET['sno'];
$sql="delete from task where id='$id'";
if($conn->query($sql) === TRUE){
  header("location:index.php");
  echo"successfully updated";
}
else{
  echo "Error ".$conn->error;
}

?>
