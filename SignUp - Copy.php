<!DOCTYPE html>
<html>
<title> SignuP </title>
<head>
<link rel="stylesheet" href="css files/styleup.css">
</head>
<body>
   <div class="center">
     <form autocomplete="off" method="POST" >
     <h1>User Registration </h1>
	 <div class="text_field" >
	    <input type="text" name="name" required>
		<span> </span>
		<label> Full Name </label>
    </div>
	<div class="text_field" >
	    <input type="text" name="username" required>
		<span> </span>
		<label> User Name </label>
    </div>
	<div class="text_field" >
	    <input type="password" name="pass" required>
		<span> </span>
		<label> Password </label>
    </div>
	<div class="text_field" >
	    <input type="password" name="cpass" required>
		<span> </span>
		<label> Confirm Password </label>
    </div>
	<div class="text_field" >
	    <input type="text" name="mobile" required>
		<span> </span>
		<label> Mobile Number </label>
    </div>
	<div class="text_field" >
	    <input type="text" name="dob" required>
		<span> </span>
		<label> Date Of Birth </label>
    </div>
	<input type="submit" value="Register" name="register">
	
	<div class="log" >
	   Already Registered?
	   <a href="Login.php" > <br/> Please Login </a>
    </div>
	
   </form>
  </div>
  

<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);
   



if(isset($_POST['register'])){
	$name= $_POST['name'];
	$username=$_POST['username'];
	$pass=trim($_POST['pass']);
	$cpass=trim($_POST['cpass']);
	$mobile=$_POST['mobile'];
	$dob=$_POST['dob'];
	
	
	if($pass==$cpass){
		$s="SELECT * FROM `signup` WHERE `User Name`='$username'";
		$res=mysqli_query($conn,$s);
		$num=mysqli_num_rows($res);
		if($num==1){
			echo "<script>alert('USERNAME ALREADY TAKEN! Please choose different username')</script>";
			
		}
		else{
			$s1="SELECT * FROM signup WHERE `Mobile Number`='$mobile'";
		$r=mysqli_query($conn,$s1);
		$n=mysqli_num_rows($r);
		if($n==1){
			echo "<script>alert('Mobile no. already registered. Please Login')</script>";
		}
		else{
	$sql="INSERT INTO signup (`Full Name`, `User Name`, `Password`, `Confirm Password`, `Mobile Number`, `Date Of Birth`) VALUES ('$name', '$username', '$pass', '$cpass', $mobile, '$dob')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid credentials!')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Please Login')</script>";								
		
		header('location:Login.php');
	}
	}
	}
	}
	else{
		echo "<script>alert('Passwords do not match!')</script>";
	}
}
?>
 </body>
</html>
	
	