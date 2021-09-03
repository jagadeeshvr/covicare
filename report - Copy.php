<html>
<head>
	<title> Covid Report </title>
	
	<!--  style section  -->
	<style>
	body{
		background-color: whitesmoke;
	}
	input{
		width:30%;
		height:5%;
		border:1px;
		border-radius:05px;
		padding:8px 15px 8px 15px;
		margin:10px 0px 15px 0px;
		box-shadow:1px 1px 2px 1px grey;
	}
	
	</style>
	
</head>
<body>
	<center>
		<form action=" " method="POST">
			<input type="text" name="id" placeholder="enter the ID to search" /> </br> 
			<input type="submit" name="search" value="search-data"> 
		</form>
		

<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="social relevance";
    $conn=mysqli_connect($host,$user,$pass,$db);
	
	
	if(isset($_POST['search']))
	{
		$id=$_POST['id'];
		
		$query="SELECT * FROM pinformation WHERE patientID='$id' ";
		$query_run=mysqli_query($conn,$query);
		
		if($query_run)
		{
		while($row = mysqli_fetch_array($query_run))
		{
			?>
				<form action="" method="POST">
					<label for="">Patient ID</label>
					<input type="text" value="<?php echo $row['patientID'] ?>"/> </br></br>
					
					<label for="">Patient Name</label>
					<input type="text" value="<?php echo $row['patientName'] ?>" /> </br></br>
					
					<label for="">Covid Status</label>
					<input type="text" value="<?php echo $row['covidStatus'] ?>"/> </br></br>
				</form>
			<?php	
		}
		}
	}
?>		 
		
	</center>		
</body>
</html>	