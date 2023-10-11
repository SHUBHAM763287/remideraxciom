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
    $id=$_GET['id'];
              $task = $_POST['task'];    
              $venue = $_POST['venue'];
              $date=$_POST['task_date'];
              $time=$_POST['time'];

              $query   = "update task set task_details='$task',venue='$venue',date='$date',time='$time' where id='$id'";
              $result = mysqli_query($conn,$query) or die(mysql_error());

              if($result){
                  echo '<script>alert("Successfully Task updated")</script>';
                  echo '<script>location.href="index.php"</script>';
              }else{
                echo '<script>alert("Something went wrong")</script>';
                  echo '<script>location.href="task_edit.php"</script>';
              }
}

   ?>

<?php
$id=$_GET['id'];
$select="SELECT * FROM task where id='$id'";
$result = mysqli_query($conn,$select) or die(mysql_error());

$task_fetch=mysqli_fetch_array($result,MYSQLI_BOTH);
 ?>
<div id="login-form-wrap" style=" background-color:#787c87">
  <h2>Add Task</h2>
  <form method="post" class="task">
    <p>
    <input type="text"  name="task" placeholder="Enter Task details" required value="<?php echo $task_fetch['task_details'] ?>">
    </p>
    <p>
    <input type="text"  name="venue" placeholder="Enter the venue" required value="<?php echo $task_fetch['venue'] ?>">
    </p>
    <p>
    <input type="date"  name="task_date"  required value="<?php echo $task_fetch['date'] ?>">
    </p>
    <p>
    <input type="text"  name="time" placeholder="Enter the Time" value="<?php echo $task_fetch['time'] ?>" required>
    </p>
    <p>
    <input type="submit" value="Update" name="submit" class="btn-success" style="background-color:#3c7dc3">
    </p>
  </form>

</div>
</body>


</html>
