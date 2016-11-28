
<?php

include "connect.php"; 
$result ="SELECT * FROM liuyan order by id asc";
$row=mysqli_query($con,$result);

  ?>

<html>
<head>
<meta content="text/html; charset=UTF-8" />
<title>留言版</title>
<style>
#div1
{
  position: absolute;
  top:10px;
  left:450px;
  height:400px;
  width:400px;
  overflow-y:scroll;
  overflow-x:hidden;  
  background-color: #b0f0ff;
}

body
{
    background-color: #00bbff;
}

#div2
{
  position: absolute;
  left:450px;
  top:410px;
}

#textarea
{
  height:150px;
  width:400px;
}

input
{
  height:20px;
  width:60px;
}

</style>

</head>
<body>
<div id="div1">
    <?php
    while($su = mysqli_fetch_array($row))
  { 
    echo "<label>".$su['name']."留言于 </label>".$su['time_at']."<br>"; 
    ?>
       <?php echo "<p>".$su['info']."</p> <br>----------------------------------------<br>"; ?>
  <?php } ?>
</div>
<div id="div2">
  <label>Your name:</label>
  <input name="username"  id="username" type="text">   <br><br>
  <label>What do you want to say:</label><br><br>
  <textarea name="content" id="textarea"></textarea>
  <input value="Send it" name="submit" class="submit" type="submit" onclick='send();'>   
</div>
</body>
<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script>
function send()
{
   var username=document.getElementById("username").value;
   if(username.length < 3 || username.length >10)
   {
    alert ("你的代号过长或者过短");
    return false;
   }
   var content=document.getElementById("textarea").value;
   if (content.length == 0)
   {
    alert ("你总不能什么都不说就让我提交吧?");
    return false;
   }
   var url = "insert1.php"; 
   var data1 =
   {
    "username" :username,
    "content"  :content,
   }
   $.ajax({                                
            type: 'POST',  
                url: url,
                dataType: 'text',
                data: data1,
                beforeSend: function() 
                {   
                },  
                complete: function() 
                {  
                           
                },  
                success: function(a) 
                { 
                   $('#div1').append(a); 
                },
            }
                );
}
</script>
</html>

