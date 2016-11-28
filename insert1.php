<?php 
include "connect.php"; 

$_SESSION['user']=$_POST['username'];
if($_POST);
    {  
      $username=$_POST['username'];  
      $content=$_POST['content'];

      $sql="insert into liuyan (name,info,time_at) VALUES('$username','$content',NOW())";
      $result=mysqli_query($con,$sql);
      echo "<label>".$username."留言于 ".date('Y-m-d G:i:s')."</label><br>";
      echo "<p>".$content."</p> <br>----------------------------------------<br>";
    }
?>

