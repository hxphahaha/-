<html>
<title>login</title>
<head>
<style>
img{  
        margin: 0px;  
        padding: 0px;outline: none; 
        z-index:-1;
        height:97.5%;
        width:100%; 
    }  
  
    #logindiv {  
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
<script>
function register(){
    window.location.href='register.php';
}
function chk_ajax_login_with_php(){ 
  var username=document.getElementById("username").value;  
  var password=document.getElementById("password").value;  
  var data=
  {
    "username":username,
    "password":password,
  }
  var url = "check1.php";  
                $.ajax({  
                               type: 'POST',  
                               url: url,  
                               dataType: 'text',  
                               data: data,  
                               beforeSend: function() {  
                                 document.getElementById("status").innerHTML= 'checking...'  ;  
                                         },  
                               complete: function() {  
                                          
                               },  
                               success: function(a) {  
                                    document.getElementById("status").innerHTML = a;

                                    if (a=="success  ")
                                    { 
                                          window.location.href='index3.php'; 
                                    }                                      
                                }  
                       });  

}  
</script>
</head>
<body>
<img src='beijing2.png'>
<div id='logindiv'>
        <label>Username:</label>  
            <input name="username"  id="username" type="text">  
        <label>Password:</label>  
            <input name="password" id="password" type="password">  
            <input value="Submit" name="submit" class="submit" type="submit" onclick='chk_ajax_login_with_php();'> 
            &nbsp<input value="Register" name="button" class="button" type="button" onclick='register();'>     
             <div id='status'></div>
</div>
</body>
</html>




