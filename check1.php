<?php 
include "connect.php"; 
session_start();
  if($_POST){  
    
      $username=$_POST['username'];  
      $password=$_POST['password'];  
        
       $sql="select * from login where acc='$username' and pwd='$password'"; 
       $result=mysqli_query($con,$sql); 
       $res=mysqli_num_rows($result);  
         
       if($res){  
         
          $rs_login=mysqli_fetch_array($result);  
          $uid=$rs_login['id'];  
          $_SESSION['id']=$uid;  
          echo "success";}
          else{  
         
         echo "invalid username or password";  
         
       }  
   }  
     
?>  