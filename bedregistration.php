<html>
<head>
<title> Bed Registration </title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 
<!-- custom css file link  -->
<link rel="stylesheet" href="css files/stylebed.css">


</head>

<body>

	<h1> Registration For Beds </h1>
	</br>
 
 <?php  	
	$host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);
	
	require 'mailDetails.php';

?>			

<div class="wrapper">
	<div class="menu"> 
		<p><label>Hospital Type :</label>
					<select name="type" id="type">
						<option>----------SELECT----------</option>
						<option>Government</option>
						<option>Private</option>
                    </select>
        </p>
	</div>
</div>
							
<div class="content">
<div class="data" id="Government">
<div class="center">
<form autocomplete="off" method="POST">	
<p><label>Hospital Name :</label>
<select name="government">
	<option>-------------------------------------------SELECT-------------------------------------------</option>
<?php
	$s="SELECT HName FROM bedsinformation WHERE Type='Government'";
									
								
	$res=mysqli_query($conn,$s);
	while($rows=mysqli_fetch_assoc($res))
	{
		$HName=$rows['HName'];
										
		echo"<option value='$HName'>$HName</option>";
	}
	
?>
</select>
</p>
</br>
							
	<div id="disp">  </div>
	<p><label>Bed Type      :</label></br>
        <select name="bed1">
			<option>--------SELECT---------</option>
            <option>Regular Bed</option>
			<option>Bed with Oxygen</option>
			<option>Bed with Ventilator</option>
			<option>ICU Bed</option>
        </select>
    </p>
	
	
	<div class="text_field" >
    	<span> </span>
		<input type="text" name="pname" required>
		<label> Patient Name</label>
	</div>	
	
	<div class="text_field" >
		<span> </span>
		<input type="text" name="address" required>
		<label> Address</label>
	</div>
	
	<div class="text_field" >
	   <span> </span>
	   <input type="text" name="pnumber" required>
	    <label> Phone Number</label>
	</div>
	
	<div class="text_field" >
	   <span> </span>
	   <input type="text" name="email" required>
	    <label> Email Id </label>
	</div>
	
	
	<br>
	<input type="submit" value="Register" name="sub1">
	</form>
	</div>
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);

	$r1=rand(1,10000);
	$rand="G-$r1";
    $conn=mysqli_connect($host,$user,$pass,$db);

	if(isset($_POST['sub1'])){
	$pname=$_POST['pname'];
	$address=$_POST['address'];
	$pnumber=$_POST['pnumber'];
	$email_id=$_POST['email'];
	$btype=$_POST['bed1'];
	$government=$_POST['government'];

	$sql="INSERT INTO bedregistration (`Patient Name`,`Address`,`Ph Number`,`Email_Id`,`Bed_id`,`Type`,`HName`) VALUES ('$pname','$address',$pnumber,'$email_id','$rand','$btype','$government')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
		
	}
	else{
		//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Bed Registration Successful';

			$mail->Body    = '<p>Dear '.$pname.',  Your Bed Registration Has Been Successful.</p>
							  <p>BED ID : <b>'.$rand.'</p>
							  <p>HOSPITAL NAME : <b>'.$government.'</p>
							  <p>BED TYPE : <b>'.$btype.'</p>';

			$mail->AltBody = 'Your BED-ID is '.$rand.'';

			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
			
		echo"<script>alert('Registration Successful... Your Hospital Name And Bed-ID is sent to your registered EMAIL ID.  Please keep this Details for future reference')</script>";								
		
		if($btype=="Regular Bed"){	
		$s1="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Regular Bed`=`Regular Bed`-1 WHERE `Total Vacant Bed`>0 and `Regular Bed`>0 and HName='$government'";
		$q=mysqli_query($conn,$s1);
		}
		else if($btype=="Bed with Oxygen"){	
		$s2="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Bed With Oxygen`=`Bed With Oxygen`-1 WHERE `Total Vacant Bed`>0 and `Bed With Oxygen`>0 and HName='$government'";
		$q2=mysqli_query($conn,$s2);
		}
		else if($btype=="Bed with Ventilator"){	
		$s3="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Bed With Ventilator`=`Bed With Ventilator`-1 WHERE `Total Vacant Bed`>0 and `Bed With Ventilator`>0 and  HName='$government'";
		$q3=mysqli_query($conn,$s3);
		}
		else{	
		$s4="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `ICU Bed`=`ICU Bed`-1 WHERE `Total Vacant Bed`>0 and `ICU Bed`>0 and HName='$government'";
		$q4=mysqli_query($conn,$s4);
		}
	}
}

	
	?>
</div>


<div class="data" id="Private">
<div class="center">
	<form autocomplete="off" method="POST">	
		<p><label>Hospital Name :</label>
            <select name="private">
			<option>-------------------------------------------SELECT-------------------------------------------</option>
             <?php
				$s="SELECT HName FROM bedsinformation WHERE Type='Private'";
				$res=mysqli_query($conn,$s);
				while($rows=mysqli_fetch_assoc($res))
			{
			$HName=$rows['HName'];
			echo"<option value='$HName'>$HName</option>";
			}
			?>
            </select>
		</p>
		
	</br>
							
							
	<div id="disp">  </div>
	<p><label>Bed Type </label></br>
        <select name="bed2">
			<option>--------SELECT---------</option>
            <option>Regular Bed</option>
			<option>Bed with Oxygen</option>
			<option>Bed with Ventilator</option>
			<option>ICU Bed</option>
        </select>
    </p>
	
	<div class="text_field" >
		<span> </span>
	    <input type="text" name="pname" required>
		<label> Patient Name</label>
	</div>	
	
	<div class="text_field" >
		<span> </span>
		<input type="text" name="adress" required>
		<label> Address</label>
	</div>
	
	<div class="text_field" >
		<span> </span>
		<input type="text" name="pnumber" required>
		<label> Phone Number</label>
	</div>
	
	<div class="text_field" >
		<span> </span>
		<input type="text" name="email" required>
		<label> Email Id</label>
	</div>
	
	<br>
	<input type="submit" value="Register" name="sub2">
	</form>
	
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);

	$r1=rand(1,10000);
	$rand="P-$r1";
    $conn=mysqli_connect($host,$user,$pass,$db);

	if(isset($_POST['sub2'])){
	$pname=$_POST['pname'];
	$address=$_POST['address'];
	$pnumber=$_POST['pnumber'];
	$email_id=$_POST['email'];
	$btype=$_POST['bed2'];
	$private=$_POST['private'];

	$sql="INSERT INTO bedregistration (`Patient Name`,`Address`,`Ph Number`,`Email_Id`,`Bed_id`,`Type`,`HName`) VALUES ('$pname','$address',$pnumber,'$email_id','$rand','$btype','$private')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
		
	}
	else{
		//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Bed Registration Successful';

			$mail->Body    = '<p>Dear '.$pname.', Your Bed Registration Has Been Successful.</p>
							  <p>BED ID : <b>'.$rand.'</p>
							  <p>HOSPITAL NAME : <b>'.$private.'</p>
							  <p>BED TYPE : <b>'.$btype.'</p>';

			$mail->AltBody = 'Your BED-ID is '.$rand.'';

			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
		
		echo"<script>alert('Registration Successful... Your BED-ID is $rand   Please keep this number for future reference')</script>";								
		
		if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
		  
	}
	else
		echo"<script>alert('Registration Successful...Your Hospital Name And Bed-ID is sent to your registered EMAIL ID.  Please keep this Details for future reference')</script>";	
		
		if($btype=="Regular Bed"){	
		$s1="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Regular Bed`=`Regular Bed`-1 WHERE `Total Vacant Bed`>0 and `Regular Bed`>0 and HName='$private'";
		$q=mysqli_query($conn,$s1);
		}
		else if($btype=="Bed with Oxygen"){	
		$s2="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Bed With Oxygen`=`Bed With Oxygen`-1 WHERE `Total Vacant Bed`>0 and `Bed With Oxygen`>0 and HName='$private'";
		$q2=mysqli_query($conn,$s2);
		}
		else if($btype=="Bed with Ventilator"){	
		$s3="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `Bed With Ventilator`=`Bed With Ventilator`-1 WHERE `Total Vacant Bed`>0 and `Bed With Ventilator`>0 and  HName='$private'";
		$q3=mysqli_query($conn,$s3);
		}
		else{	
		$s4="UPDATE bedsinformation SET `Total Vacant Bed`=`Total Vacant Bed`-1, `ICU Bed`=`ICU Bed`-1 WHERE `Total Vacant Bed`>0 and `ICU Bed`>0 and HName='$private'";
		$q4=mysqli_query($conn,$s4);
		}
	
	}
}

	
	?>
</div>		
	
	
	
</div>
	
	
<h2 id="h"></h2>
	</form>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
	$(document).ready(function(){
		$("#type").on('change',function(){
			$(".data").hide();
			$('#' + $(this).val()).fadeIn(700);
		}).change();
		
	$('#ch').click(function(e){
				e.preventDefault();
				$.ajax({
					method:"post",
					url:"fetchdata.php",
					data:$('#disp').serialize(),
					dataType:"html",
					success:function(response){
						$('#h').html(response);
					}
				});
		});

	});
	</script>
	
	<?php
	if(isset($_POST['sub'])){
	$pname= $_POST['pname'];
	$adress=$_POST['adress'];
	$pnumber=$_POST['pnumber'];
	$type=$_POST['type'];
	$hname=$_POST['hname'];
	
	$sql="INSERT INTO bedregistration (`Patient Name`, `Adress`, `Ph Number`, `Type`, `HName`) VALUES ('$pname', '$adress', '$pnumber', '$type', '$hname')";
	$query=mysqli_query($conn,$sql);
	}
	
	?>

	
</body>
</html>