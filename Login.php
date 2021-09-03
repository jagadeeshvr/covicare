<!DOCTYPE html>
<html lang="en" dir="ltr">> 
<head>
  <meta charset="utf-8">
  <title> Login Form </title>
  <link rel="stylesheet" href="css files/Stylelog.css">
</head>
<body>
   <div class="center">
    <h1> <b>Login Form</b> </h1>
    <form autocomplete="off" method="post">
        <div class="text_field">
		  <input type="text" name="username" required>
		  <span> </span>
		  <label> UserName </label>
		</div>
		
		<div class="text_field">
		  <input type="password" name="pass" required>
		  <span> </span>
		  <label> Password </label>
		</div>
		<input type="submit" value="Login" name="Login">
		<div class="signup_link">
		   Not a member?
		   <a href="SignUp.php"> SignUp </a>
		</div>   
    </form>
   </div>
   
   <?php
	
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);
	
	if(isset($_POST['Login'])){
	$username=$_POST['username'];
	$pass=$_POST['pass'];
	
	$s="SELECT * FROM signup WHERE `User Name`='$username' and `Password`='$pass'";
	$res=mysqli_query($conn,$s);
	$num=mysqli_num_rows($res);
	if($num==1){
		
		header('location:Display.php');
	}
	else{
		echo "<script>alert('Invalid Credentials')</script>";
	}
	}	
	?>



</body>
</html>