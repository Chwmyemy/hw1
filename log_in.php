<!DOCTYPE html>
<html>
<head>
	<title>登录与否</title>
</head>
<body>
	<?php  
		$username=$_POST["Username"];
		$password=$_POST["Password"];
		$con=mysql_connect("localhost","root","3180105091");//连接mysql 数据库，账户名root ，密码3180105091 
    	if (!$con) { 
     		die('数据库连接失败'.$mysql_error()); 
    	} 
   		mysql_select_db("hw2",$con);//use hw2数据库；
   		$tmpusername=null; 
    	$tmppassword=null; 
    	$result=mysql_query("select * from users_data where user ='{$username}';");//查出对应用户名的信息 
    	while ($row=mysql_fetch_array($result)) {//while循环将$result中的结果找出来 
    	  	$tmpusername=$row["user"]; 
   	   		$tmppassword=$row["password"]; 
          $email=$row["email"];
    	}
    	if (is_null($tmpusername)) {//用户名在数据库中不存在时跳回login.html界面 
  	?> 
  		<script type="text/javascript"> 
    		alert("用户名不存在"); 
    		window.location.href="login.html"; 
  		</script> 
  	<?php 
    	} 
    	else { 
      		if ($tmppassword!=$password){//当对应密码不对时跳回login.html界面 
  	?> 
  			<script type="text/javascript"> 
    			alert("密码错误"); 
    			window.location.href="login.html"; 
  			</script> 
  	<?php 
      		} 
      	else{ 
   				echo "Welcome PAPIC TECH",'<br/>';
   				echo "your uername is " ,$tmpuername,'<br/>';
   				echo "your password is ", $tmppassword,'<br/>';
   				echo "your email address is " ,$email,'<br/>';
      		} 
    	} 
  		mysql_close($con);//关闭数据库连接，如不关闭，下次连接时会出错 
  ?>

</body>
</html>