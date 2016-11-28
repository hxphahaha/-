<?php
$con = mysqli_connect('localhost','root','');
if (!$con) 
    {
        die("Connection failed: " . mysqli_connect_error);
    }
mysqli_select_db($con,'board'); 
mysqli_set_charset($con, "utf-8"); 
?>