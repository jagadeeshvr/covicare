<html>
<head>
	<title> Hospitals details </title>
	<link rel="stylesheet" href="css files/hospitalstyle.css">

</head>


<body>
	
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);
	?>
	
	<header>
		<div id="menu" class="fas fa-bars"> </div>
		<nav class="navbar">
			<a class="active" href="bedregistration.php">Register For Beds</a>
		
		</nav>
		<div class="search-form">
			<input type="search" class="search-data" placeholder="search For Hospitals" id="search" required>
			<button type="submit"><h4>Search</h4></button>
		</div>
	</header>
	<br/>
	<br/>
	<br/>

	
	<h1> Available Beds Information  </h1>
	

	
	<div class="center">
		<h4> Vacant Beds In Government Covid-19 Hospitals </h4>
	</div>
	 <table id="MyTable">
        <th>HName</th>
        <th>Adress</th>
		<th>Contact</th>
		<th>Regular Bed</th>
		<th>Bed With Oxygen</th>
		<th>Bed With Ventilator</th>
		<th>ICU Bed</th>
		<th>Total Vacant Bed</th>
		
		<?php
		$sql="SELECT * FROM bedsinformation WHERE Type='Government'";
		
		$query=mysqli_query($conn,$sql);
		$nums=mysqli_num_rows($query);
		
		
		while($res=mysqli_fetch_array($query)){
			?>
			<tr>
			 <td><?php echo $res['HName']; ?></td>
			 <td><?php echo $res['Adress']; ?></td>
			 <td><?php echo $res['Contact']; ?></td>
			 <td><?php echo $res['Regular Bed']; ?></td>
			 <td><?php echo $res['Bed With Oxygen']; ?></td>
			 <td><?php echo $res['Bed With Ventilator']; ?></td>
			 <td><?php echo $res['ICU Bed']; ?></td>
			 <td><?php echo $res['Total Vacant Bed']; ?></td>
			</tr>
			<?php
		}
	  ?>
    </table>  
	
	<div class="center">
		<h4> Vacant Beds In Private Covid-19 Hospitals </h4>
	</div>
	
    <table id="MyTable">
        <th>HName</th>
        <th>Address</th>
		<th>Contact</th>
		<th>Regular Bed</th>
		<th>Bed With Oxygen</th>
		<th>Bed With Ventilator</th>
		<th>ICU Bed</th>
		<th>Total Vacant Bed</th>
		
		<?php
		$sql="SELECT * FROM bedsinformation WHERE Type='Private'";
		
		$query=mysqli_query($conn,$sql);
		$nums=mysqli_num_rows($query);
		
		
		while($res=mysqli_fetch_array($query)){
			?>
			<tr>
			 <td><?php echo $res['HName']; ?></td>
			 <td><?php echo $res['Adress']; ?></td>
			 <td><?php echo $res['Contact']; ?></td>
			 <td><?php echo $res['Regular Bed']; ?></td>
			 <td><?php echo $res['Bed With Oxygen']; ?></td>
			 <td><?php echo $res['Bed With Ventilator']; ?></td>
			 <td><?php echo $res['ICU Bed']; ?></td>
			 <td><?php echo $res['Total Vacant Bed']; ?></td>
			</tr>
			<?php
		}
	  ?>
    </table>  
	


	
</body>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
	<script>
		$(document).ready(function(){
		$('.search-form #search').on('keyup',function(){
		var value=$(this).val().toLowerCase();
		$('#MyTable tr').filter(function(){
			$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
		});
		});
		});
	</script>
	
	
</html>


