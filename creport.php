<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Covid Report</title>
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!--- style section --->
	<style>
	body{
			background: url(image/bground-image.jpg) no-repeat;
			background-size:cover;
	}
	input{
		
		border:1px;
		border-radius:10px;
		padding:8px 15px 8px 15px;
		margin:10px 0px 15px 0px;
		box-shadow:1px 1px 2px 1px grey;
	}
	button{
		margin-top:9px;
		margin-left:05px;
		width:60%;
		height:60%;
		border:1.5px solid;
		background:blue;
		border-radius:25px;
		font-size:20px;
		color:white;
		font-weight:900;
		cursor:pointer;
		outline:none;
	}
	[type="submit"]:hover{
		border-color:red;
		transition: .5s;
	}
	
	.container form{
		padding: 0 35px;
		box-sizing: border-box;
		background-color:lightcyan;
	}
	
	</style>
	
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    
                    <div class="card-body">
						<h2 style="text-align:center"> Covid Report </h2>

                        <form action="" method="POST">
                            <div class="row">
								
                                <div class="col-md-8">
                                    <input type="text" name="id" placeholder="Enter The ID To Search" value="<?php if(isset($_post['id'])){echo $_post['id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
						</form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","social relevance");

                                    if(isset($_POST['id']))
                                    {
                                        $id = $_POST['id'];

                                        $query="SELECT * FROM pinformation WHERE patientID='$id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">Patient ID</label>
                                                    <input type="text" value="<?= $row['patientID']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Patient Name</label>
                                                    <input type="text" value="<?= $row['patientName']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Covid Status</label>
                                                    <input type="text" value="<?= $row['covidStatus']; ?>" class="form-control">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>
						

                    </div>
                </div>

            </div>
        </div>
    </div>

   
</body>
</html>