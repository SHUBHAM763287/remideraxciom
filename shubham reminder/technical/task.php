<?php
session_start();
include "connect.php";
$user_id = $_SESSION['sno'];
if(!isset($user_id)){
   header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>

<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include"header.php"; ?>
  <?php
  if (isset($_POST['submit'])) {
              $task = $_POST['task'];   
              $venue = $_POST['venue'];
              $date=$_POST['task_date'];
              $time=$_POST['time'];

              $selec_s   = "INSERT into task(task_details,venue,date,time,status,user_id)values('$task','$venue','$date','$time','1','$user_id') ";
              $result = mysqli_query($conn,$selec_s) or die(mysql_error());

              if($result){
                  echo '<script>alert("Successfully Task Added")</script>';
                  echo '<script>location.href="index.php"</script>';
              }else{
                echo '<script>alert("Something went wrong")</script>';
                  echo '<script>location.href="task.php"</script>';
              }
}

   ?>

<div id="login-form-wrap" style=" background-color:#8794FA; padding:1rem">
  <h2>Add Task</h2>
  <form method="post" class="task" >
    <p>
    <input type="text"  name="task" placeholder="Enter Task details" required>
    </p>
    <p>
    <input type="text"  name="venue" placeholder="Enter the venue" required>
    </p>
    <p>
    <input type="date"  name="task_date"  required>
    </p>
    <p>
    <input type="text"  name="time" placeholder="Enter the Time"  required>
    </p>
    <p>
    <input type="submit" value="submit" name="submit" class="btn-success" style="background-color:#1c2daf">
    </p>
  </form>

</div>

</body>
</html>
