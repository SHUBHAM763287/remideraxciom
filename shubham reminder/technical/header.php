
<nav class="navbar navbar-light bg-light" style="  background-color:#7e23dc !important;">
<div class="container-fluid">
<a class="navbar-brand" href="index.php" style="color:white;">R E M I N D E R</a>
<div class="d-flex regis">
  <?php
  if(isset($_SESSION['sno'])){
    $id=$_SESSION["sno"];
    $selectuser="select * from user where sno='$id'";
    $result=mysqli_query($conn,$selectuser);
    $user_fetch=mysqli_fetch_array($result,MYSQLI_BOTH);
      echo'<button class="btn" style="color:white;">Hello !! '.$user_fetch['email'].'</button>';
        echo'<a class="btn" href="logout.php" style="color:white;padding:10px; background-color:white;color:black;">Logout</a>';
  }else{
  echo '
    <a href="login.php"  class="btn btn-outline-success" style="background-color:#8AA7E5; color:white;">Log in</a>';

  }
     ?>

</div>
</div>
</nav>
