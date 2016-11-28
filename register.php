<?php
session_start();
?>
<html>
<head>
<style>
    form{  
        position:absolute;
        top:150px;
        left:500px;
        border: 1px solid #270644;  
        width: 250px;  
        -moz-border-radius: 20px;  
        -webkit-border-radius: 20px;  
        background:  -moz-linear-gradient(19% 75% 90deg,#716D78, #DFD2E8);  
        background:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#DFD2E8), to(#716D78));  
        margin:50px auto;  
        padding: 20px;  
        -moz-box-shadow:0px -5px 300px #270644;  
        -webkit-box-shadow:0px -5px 300px #270644;  
    } 
    img{
        z-index:-1;
        width:100%;
        height:97.5%;
    }
     label {  
        font-size: 12px;  
        font-family: arial, sans-serif;  
        list-style-type: none;  
        color: #000;  
        text-shadow: #000 1px 1px;  
        margin-bottom: 10px;  
        font-weight: bold;  
        letter-spacing: 1px;  
        text-transform: uppercase;  
        display: block;  
    }  
  
    input {  
      -webkit-transition-property: -webkit-box-shadow, background;  
      -webkit-transition-duration: 0.25s;  
        padding: 6px;  
        border-bottom: 0px;  
        border-left: 0px;  
        border-right: 0px;  
        border-top: 1px solid #FFFFFF;  
        -moz-box-shadow: 0px 0px 2px #000;  
        -webkit-box-shadow: 0px 0px 2px #000;  
        margin-bottom: 10px;  
        background: #EDE7F1;  
        width: 230px;  
    }  
  
    input.submit {  
      -webkit-transition-property: -webkit-box-shadow, background;  
      -webkit-transition-duration: 0.25s;  
        width: 100px;  
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#5E476F), to(#8B7999));     
        background:  -moz-linear-gradient(19% 75% 90deg,#8B7999, #5E476F);  
        color: #fff;  
        text-transform: uppercase;  
        text-shadow: #000 1px 1px; 
        border-top: 1px solid #ad64e0;  
        margin-top: 10px;  
    } 
    input.button
    {
      -webkit-transition-property: -webkit-box-shadow, background;  
      -webkit-transition-duration: 0.25s;  
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#5E476F), to(#8B7999));     
        background:  -moz-linear-gradient(19% 75% 90deg,#8B7999, #5E476F);  
        width: 100px;  
        color: #fff;  
        text-transform: uppercase; 
        text-shadow: #000 1px 1px;  
        border-top: 1px solid #ad64e0;
        margin-top: 10px; 
 
        width:100px;
        height:28px;        
    }
    a
    {
    text-decoration:none;
    font:16px arial,sans-serif;
    }
</style>
<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript">
    function login(){
        window.location.href='login.php';
    }
    function check(){
        var username=document.getElementById("username");
        if(username.length<6||username.length>12)
        {
            alert("Your username is too short or too long");
            return false;
        }
        var password=document.getElementById("password");
        if(password.length<8||password.length>18)
        {
            alert("Your password is too short or too long");
            return false;
        }
    }
</script>
</head>
<body>
<img src="1.jpg">

<form method="post" action="">
    <label>Username:</label>
    <input type="text" name="Username" id="username">
    <label>Password:</label>
    <input type="Password" name="Password" id="password">
    <input value="Submit" name="B2" class="submit" type="submit" onclick='check();'> 
    &nbsp<input value="Login Now" name="button" class="button" type="button" onclick='login();'> 
</form>
</body>
</html>


<?php

//检测是否提交
    
if(isset($_POST['B2']))
{
    $_SESSION['sub']=1;
    $_SESSION['user']=$_POST['Username'];
}
if(isset($_SESSION['sub']))
{
    $acc=$_POST['Username'];
    $pwd=$_POST['Password'];    
    if($acc==''||$pwd=='')
    {
                echo "<script type='text/javascript'>
             alert ('账号和密码不允许为空')
            </script>";
    }

    else
    {
include 'connect.php';
$sql0 = "SELECT * from login";
$result0 = mysqli_query($con,$sql0);

//检测账号是否被注册

while($su = mysqli_fetch_array($result0))
{
    if($_SESSION['user']==$su['acc'])
    {
        $_SESSION['used']=1;
        echo "<script type='text/javascript'>
             alert ('该账号已被注册')
            </script>";
        break;
    }
}

//如果账号未被注册则进行注册

if(!(isset($_SESSION['used'])))
{
$sql = "INSERT INTO login (acc,pwd) VALUES ('$acc','$pwd')";
$result = mysqli_query($con,$sql);
echo "<script type='text/javascript'>
alert ('恭喜你注册成功!现在你可以尝试登陆了')
</script>";
}
}
session_destroy();
}
?>


