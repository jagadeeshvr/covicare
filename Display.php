<html>
<head>
	<title> COVID-19 CASES </title>

		<link rel="stylesheet" href="css files/styledisp.css">
</head>
       

<header>

		<div id="menu" class="fas fa-bars"> </div>

		<nav class="navbar">
			<a href="#home">Home</a>
			<a href="#prevent">Prevent</a>
			<a href="#symptoms">Symptoms</a>
			<a href="#precautions">Precautions</a>
			<a href="#hand-wash">HandWash</a>
			<a href="Hospitals.php">Hospitals</a>
			<a href="vaccines.php"> Vaccines </a>
		</nav>

</header>
	<section class="cases" id="cases">
	<div>
		<a href="chatbot.html"> chat with us ! </a>
	</div>	
	<h1> STATEWISE COVID-19 CASES </h1>
	
	 <style media="screen">
		
        table{
			border-collapse:collapse;
			width:1000px;
			margin-left:30px;
			margin-top:30px;
			overflow:hidden;
			border-radius:5px 5px;
			box-shadow:0 0 20px rgba(0,0,0,0.15);
        }
        th{
			text-align:center;
			font-size:20px;
			font-weight:bold;
			color:white;
			padding:6px;
			background-color:#085f63;
        }
	    td{
			 text-align:center;
			 font-size:18px;
			 border-bottom:2px solid purple;
			 
		}
	    tr:nth-of-type(even){
			background-color:#c6f1e7;
		
		}
		
		 tr:nth-of-type(odd){
			background-color:#afffff;
		 }
		tr:last-of-type{
			border-bottom:2px solid lightblue;
		}
		h1{
			font-size:30px;
			color:#210070;
			text-align:center;
			padding-top:15px;
		
		}
		
		body{
			background-color:lightcyan;
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
		}
		th,
		td{
			padding:10px 12px;
		}
</style> 
	
<body>
	<?php
    $host="localhost:3306";
    $user="root";
    $pass="";
    $db="covid management system";
    $conn=mysqli_connect($host,$user,$pass,$db);
	?>
	

	
	<table>
        <th>STATES</th>
        <th>ACTIVE</th>
		<th>CONFIRMED</th>
		<th>RECOVERED</th>
		<th>DECEASED</th>
		
		<?php

			$data= file_get_contents('https://api.covid19india.org/data.json');
			$case=json_decode($data,true);

			$scount= count($case['statewise']);
			$i=1;
	while($i<$scount){
	
	?>
	<tr>
		<td><?php echo $case['statewise'][$i]['state']?></td>
		<td><?php echo $case['statewise'][$i]['active']?></td>
		<td><?php echo $case['statewise'][$i]['recovered']?></td>
		<td><?php echo $case['statewise'][$i]['deaths']?></td>
		<td><?php echo $case['statewise'][$i]['confirmed']?></td>
		</tr>
	<?php
	$i++;
	}


?>
    </table>  
</body>
</section>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h1>Prevention from Corona Virus</h1>
        <h3>stay home, stay safe</h3>
    </div>

</section>

<!-- home section ends -->



<!-- prevent section starts  -->

<section class="prevent" id="prevent">

    <h1 class="heading"> how to prevent virus </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/pre-1.png" alt="">
            <h3>wash your place</h3>
        </div>

        <div class="box">
            <img src="image/pre-2.png" alt="">
            <h3>maintain distance</h3>
        </div>

        <div class="box">
            <img src="image/pre-3.png" alt="">
            <h3>don't touch face</h3>
        </div>

        <div class="box">
            <img src="image/pre-4.png" alt="">
            <h3>wash your hand</h3>
        </div>

        <div class="box">
            <img src="image/pre-5.png" alt="">
            <h3>use napkin</h3>
        </div>

        <div class="box">
            <img src="image/pre-6.png" alt="">
            <h3>wear a mask</h3>
        </div>
	</div>

</section>


<!-- prevent section ends -->


<!-- symptoms section starts  -->

<section class="symptoms" id="symptoms">

    <h1 class="heading">covid-19 symptoms</h1>

    <div class="column">
		
<div class="box-container">

            <div class="box">
                <img src="image/sym2.png" alt="">
                <h3>Dry Cough</h3>
            </div>

            <div class="box">
                <img src="image/sym6.png" alt="">
                <h3>Sore Throat</h3>
            </div>

            <div class="box">
                <img src="image/sym7.png" alt="">
                <h3>Cold</h3>
            </div>

            <div class="box">
                <img src="image/sym1.png" alt="">
                <h3>Fever</h3>
            </div>

            <div class="box">
                <img src="image/sym4.png" alt="">
                <h3>Difficulty in Breathing</h3>
            </div>

            <div class="box">
                <img src="image/sym3.png" alt="">
                <h3>Fatigue</h3>
            </div>
			
			  <div class="box">
                <img src="image/sym5.png" alt="">
                <h3>Loss of Taste or Smell</h3>
            </div>

        </div>

    </div>

</section>

<!-- symptoms section ends -->


<!-- precautions section starts  -->

<section class="precautions" id="precautions">

    <h1 class="heading">take precautions against covid-19</h1>

    <div class="column">

        <div class="box-container">

            <h3 class="title">things you should DO</h3>

            <div class="box">
                <img src="image/do-img1.png" alt="">
                <div class="info">
                    <h3>wash your hand</h3>
                   
            </div>

            <div class="box">
                <img src="image/do-img2.png" alt="">
                <div class="info">
                    <h3>always wear a mask</h3>
                  
                </div>
            </div>

            <div class="box">
                <img src="image/do-img3.png" alt="">
                <div class="info">
                    <h3>stay home during fever</h3>
                   
                </div>
            </div>

        </div>

        <div class="box-container">

            <h3 class="title">things you should NOT DO</h3>

            <div class="box">
                <img src="image/dont-img1.png" alt="">
                <div class="info">
                    <h3>avoid close contact with animals</h3>
                
                </div>
            </div>

            <div class="box">
                <img src="image/dont-img2.png" alt="">
                <div class="info">
                    <h3>avoid close contact with peoples</h3>
                    
                </div>
            </div>

            <div class="box">
                <img src="image/dont-img3.png" alt="">
                <div class="info">
                    <h3>avoid crowded area</h3>
                   
                </div>
            </div>

        </div>

    </div>

</section>

<!-- precautions section ends -->



<!-- hand-wash section starts  -->

<section class="hand-wash" id="hand-wash">

    <h1 class="heading">how to wash hand properly</h1>

    <div class="column">

        <div class="box-container">

            <div class="box">
                <img src="image/wash-a.png" alt="">
                <h3>water and soap</h3>
            </div>

            <div class="box">
                <img src="image/wash-b.png" alt="">
                <h3>palm to palm</h3>
            </div>

            <div class="box">
                <img src="image/wash-c.png" alt="">
                <h3>Between Fingers</h3>
            </div>

            <div class="box">
                <img src="image/wash-d.png" alt="">
                <h3>Focus on Thumbs</h3>
            </div>

            <div class="box">
                <img src="image/wash-e.png" alt="">
                <h3>Back of Hands</h3>
            </div>

            <div class="box">
                <img src="image/wash-f.png" alt="">
                <h3>Focus on wrist</h3>
            </div>
        </div>
    </div>
</section>

<!-- hand-wash section ends -->


<!-- scroll top  -->

<a href="#cases" class="scroll-top">
    <img src="image/scroll-img.png" alt="">
</a>


</html>
	