<!DOCTYPE html>
	  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Registration </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css files/stylevacci.css">
   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

</head>
<body>


	 <?php  	
		$host="localhost:3306";
		$user="root";
		$pass="";
		$db="covid management system";
		$conn=mysqli_connect($host,$user,$pass,$db);
    	
		require 'mailDetails.php';
	?>		
				
<div class="wrapper">
<h1>VACCINE REGISTRATION </h1>
	<div class="menu"> 
	

		<p><label>Vaccine(Free/Paid):</label>
                            <select name="type" id="type">
								<option>---------------SELECT---------------</option>
								<option>Free</option>
								<option>Paid</option>
                            </select>
		</p>
	</div>
</div>
							
	<div class="content">
		<div class="data" id="Free">
			<form method="POST">
			<br>
			
				<p><label>Center Name:</label>
                        <select name="bed">
							<option>----------------------------------------------SELECT----------------------------------------------</option>
                            <?php
								//$s="SELECT cname FROM vaccineinformation WHERE pay='free'";
								$s ="SELECT cname from vaccineinformation WHERE pay='free'";
									
								
								$res=mysqli_query($conn,$s);
								while($rows=mysqli_fetch_assoc($res))
								{
									$hname=$rows['cname'];
																	
									echo"<option value='$hname'>$hname</option>";
								}
							?>
                        </select>
                </p>
				<br>
							
			<div id="disp">  </div>
							
			<p><label>Vaccine Name:</label>
            <select name="vname">
				<option>------------SELECT-------------</option>
                <option>COVISHIELD (Oxford-AstraZeneca)</option>
				<option>COVAXIN (Bharat Biotech)</option>
            </select>
            </p>
			<br>
							
			<p><label>Dose:</label>
            <select name="dose">
				<option>------------SELECT-------------</option>
				<option>1</option>
				<option>2</option>
            </select>
            </p>
			<br>
							
			<label> Full Name: </label>							
			<input type="text" name="pnames" class="ip6">
			<br>
			</br>
			
			<label>E-mail:</label>					
			<input type="email" name="pmails" class="ip4">
			</br>
			<br>
			
			<label> Mobile:</label>					
			<input type="text" name="pmobs" class="ip2">
			</br>
			<br>
			
			<label> Aadhaar No :</label>					
			<input type="text" name="padhars" class="ip7">
			</br>
			<br>
			
			<label>Date Of Birth:</label>							
			<input type="date" name="padds" class="ip5">
			<br>
							
			<input type="submit" value="Submit" name="sub1">				
							
	</form>
	<?php
		$host="localhost:3306";
		$user="root";
		$pass="";
		$db="covid management system";
    	
$r1=rand(1,10000);
$rand="G-$r1";
    $conn=mysqli_connect($host,$user,$pass,$db);

if(isset($_POST['sub1'])){
	$pname=$_POST['pnames'];
	$pmob=$_POST['pmobs'];
	$padd=$_POST['padds'];
	$hn=$_POST['bed'];
	$bt=$_POST['vname'];
	$dose=$_POST['dose'];
	$email_id=$_POST['pmails'];
	$adhaarno=$_POST['padhars'];

	$sql="INSERT INTO `vaccineregistration` (`name`,`mobile`,`dob`,`cname`,`vname`,`dose`,`email`,`Aadhar_no`) VALUES ('$pname','$pmob','$padd','$hn','$bt','$dose','$email_id','$adhaarno')";
	$query=mysqli_query($conn,$sql);
	
	if(!$query){
		echo "<script>alert('Invalid Credentials')</script>";
	}	
	else{
		echo"<script>alert('Registration Successful... Please check your email inbox for confirmation')</script>";		
		//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Vaccine Booking Successful';

			$mail->Body    = '<p>Dear '.$pname.', your vaccine booking has been successful.</p>
								<p>Centre Name:<b>'.$hn.'</p>
								<p>Vaccine:<b>'.$bt.'</p>
								<p>Dose:<b>'.$dose.'</p>
							  <p>Your vaccine ID : <b>'.$rand.'</b><br/>';

			$mail->AltBody = 'Your Vaccine-ID is '.$rand.'';


			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
		$s1="UPDATE vaccine SET vavail=vavail-1 where cname='$hn' and vavail>0";
		$q=mysqli_query($conn,$s1);
	}
}

	
	?>
</div>



				<div class="data" id="Paid">
				<form method="POST">
				<br>
				<br>
				<p><label>Center Name:</label>
                            <select name="beds">
							<option>--------------------------------------------------------SELECT--------------------------------------------------------</option>
                            <?php
							$s2="SELECT cname FROM vaccineinformation WHERE pay='paid'";
									
								
									$res2=mysqli_query($conn,$s2);
									while($rows=mysqli_fetch_assoc($res2))
									{
										$hname=$rows['cname'];
										echo"<option value='$hname'>$hname</option>";
									}
								?>
                            </select>
							
                            </p>

							
							<br>
							
							<div id="disp">  </div>
							
							<p><label>Vaccine Name:</label>
                            <select name="vname">
							<option>------------SELECT-------------</option>
                            <option>COVISHIELD (Oxford-AstraZeneca)</option>
							 <option>COVAXIN (Bharat Biotech)</option>
							  
                            </select>
                            </p>
							<br>
			
			
							<p><label>Dose:</label>
                            <select name="dose">
							<option>------------SELECT-------------</option>
							<option>1</option>
							<option>2</option>
                            </select>
                            </p>
							<br>
							
							
			<label> Full Name:</label>							
			<input type="text" name="pname" class="ip6">
			<br>
			</br>
			
			<label>E-mail:</label>					
			<input type="email" name="pmail" class="ip4">
			</br>
			<br>
			
			
			<label> Mobile:</label>					
			<input type="text" name="pmob" class="ip2">
			<br>
			</br>
			
			
			<label> Aadhaar No :</label>					
			<input type="text" name="padhars" class="ip7">
			</br>
			<br>
		
					
			<label>Date Of Birth:</label>							
				<input type="date" name="padd" class="ip5">
			<br>
						
			<input type="submit" value="Submit" name="sub2">	
									
</form>		
	<?php
    $host="localhost:3306";
		$user="root";
		$pass="";
		$db="covid management system";
		$conn=mysqli_connect($host,$user,$pass,$db);
		
		$r1=rand(1,10000);
		$rands="P-$r1";

if(isset($_POST['sub2'])){
	$pname=$_POST['pname'];
	$pmob=$_POST['pmob'];
	$padd=$_POST['padd'];	
	$hn=$_POST['beds'];
	$bt=$_POST['vname'];
	$dose=$_POST['dose'];
	$email_id=$_POST['pmail'];
	$adhaarno=$_POST['padhars'];
	
	

	$sql="INSERT INTO vaccineregistration (`name`,`mobile`,`dob`,`cname`,`vname`,`dose`,`email`,`Aadhar_no`) VALUES ('$pname','$pmob','$padd','$hn','$bt','$dose','$email_id','$adhaarno')";
	$query=mysqli_query($conn,$sql);
	
	 if(!$query){
		echo "<script>alert('Invalid credentials!')</script>";
		
	}
	else{
		echo"<script>alert('Registration Successful... Please check your email inbox for confirmation')</script>";	

//sending mail to the user
		$mail->setFrom('covidmanagement.team.dsce@gmail.com');
    		$mail->addAddress($email_id);
			$mail->isHTML(true);                                  //Set email format to HTML
    		$mail->Subject = 'Vaccine Booking Successful';

			$mail->Body    = '<p>Dear '.$pname.', your vaccine booking has been successful.</p>
								<p>Centre Name:<b>'.$hn.'</p>
								<p>Vaccine:<b>'.$bt.'</p>
								<p>Dose:<b>'.$dose.'</p>
							  <p>Your vaccine ID : <b>'.$rand.'</b><br/>';

			$mail->AltBody = 'Your Vaccine-ID is '.$rand.'';

			if(!$mail->send()) {
				// echo 'Message could not be sent.';
				// echo 'Mailer Error: ' . $mail->ErrorInfo; No need to print any message
			} else {
				//echo 'Message has been sent'; 
			}
			
	$s1="UPDATE vaccine SET vavail=vavail-1 where cname='$hn' and vavail>0";
		$q=mysqli_query($conn,$s1);
	}
}

	
	?>		
	</div>
	</div>
	
</body>
</html>