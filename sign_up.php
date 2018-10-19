<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>注册用户</title> 
</head> 
<body> 
  <?php 
    session_start(); 
    $username=$_POST["Username2"]; 
    $password=$_POST["Password1"]; 
    $email=$_POST["Email"];
    $con=mysql_connect("localhost","root","3180105091"); 
    if (!$con) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("hw2",$con); 
    $tmpusername=null; 
    $tmppassword=null; 
    $tmpemail=null;
    $result=mysql_query("select * from users_data where user ='{$username}';"); 
    echo $uername;
    while ($row=mysql_fetch_array($result)) { 
      $tmpusername=$row["user"]; 
      $tmppassword=$row["password"]; 
      $tmpemail=$row["email"];
    } 
    if(!is_null($tmpusername)){ 
  ?> 
  <script type="text/javascript"> 
    alert("用户已存在"); 
   // window.location.href="login.html"; 
  </script>  
  <?php 
    }
    else{
      mysql_query("insert into users_data (user,password,email) values('{$username}','{$password}','{$email}')") or die("存入数据库失败".mysql_error()) ; 
    mysql_close($con);
  ?> 
  <script type="text/javascript"> 
    alert("注册成功"); 
    window.location.href="login.html"; 
  </script>
  <?php 
    }
  ?> 
    
    
        
      
      
</body> 
</html> 