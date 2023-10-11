<?php
session_start();
include "connect.php";
$user_id = $_SESSION['sno'];
if(!isset($user_id)){
   header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reminder</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <style>
    .btn_log{
      padding:5px;
      border:solid 2px black;
      text-decoration:none;
      border-radius: 7px;
    }
    .btn_log:hover{
      background-color: lightskyblue;
    }
    .btn-success:hover{
      background-color: #4d48b7;

    }
  </style>
  <body >
  <?php include"header.php"; ?>

<div class="reminder">
<h1>Reminder of your task</h1>
<div class="reminder_form">
  <div class="my-5">
    <a href="task.php" style="background-color:#8AA7E5; text-decoration:none;padding:0.5rem;border-radius:10px;" class="btn-success">ADD NEW TASK</a>
  </div>
  <table class="table">
  <thead style="background-color:#5750af">
    <tr style="color:white">
      <th scope="col" >Sl No</th>
      <th scope="col">Work</th>
      <th scope="col">Venue</th>
      <th scope="col">Date</th>
      <th>Time</th>
      <th>Delete</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
$select="SELECT * FROM task where status=1 and user_id='$user_id'";
$result = mysqli_query($conn,$select) or die(mysql_error());
$row=mysqli_num_rows($result);
  if($row>0) {
    $i=1;
while($fetch_task=mysqli_fetch_array($result,MYSQLI_BOTH)){
 ?>

    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $fetch_task['task_details']; ?></td>
      <td><?php echo $fetch_task['venue']; ?></td>
      <td><?php echo $fetch_task['date']; ?></td>
      <td><?php echo $fetch_task['time']; ?></td>
      <?php echo "<td><a href='delete.php?sno=".$fetch_task['id']."' class='btn_log'>Delete</a></td>";?>

        <?php echo "<td><a href='task_edit.php?id=".$fetch_task['id']."' class='btn_log'>Edit</a></td>";?>
    </tr>
<?php ++$i;}} ?>
  </tbody>
</table>
</div>
</div>
</body>
</html>
