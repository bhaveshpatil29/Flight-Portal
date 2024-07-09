<?php



$s= $_GET['seat'];
$fid=$_GET['fid'];

$conn=mysqli_connect("localhost:3306","root","abc123");
if(!$conn)
{
    
     die("error".mysql_error());
}
else
{
  
    if(! mysqli_select_db($conn,"airline"))
    {

    }
    else
    {
		$s=$s-1;
		if(isset($_GET['fn']))
        {
			$sql="insert into passenger values('".$_GET['fn']."','".$_GET['ln']."',".$_GET['age'].",'".$_GET['city']."','".$_GET['gender']."',". $fid.",".$_COOKIE['signid'].");";
		echo $sql;
		
			if(mysqli_query($conn,$sql))
			{
				
				
				echo "<script>alert('hhh');</script>";
				
			}
			else
			{
				echo mysqli_error($conn);
			// die("error".mysql_error());
			

			
					}
		 }
 
    }

}


if($s>=0)
{

    echo'
    
<!DOCTYPE HTML>

<html>
	<head>
		<title>Booking</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">

		<link rel="stylesheet" href="mycss.css">
	</head>
	<style type="text/css">
		label{
			color: white;
		}
		h2{
			color: white;
		}
	
	
	</style>
	<body>
				
				
				

				<div class="background-wrapper" style="background-image: url(airline.jpg);background-repeat: no-repeat;background-size: cover;">
				
				<!--header-->

				<div class="container-fluid" >
					<header>
						<h2></h2>
						
					</header>


					<!--panel-->
					<div class="col-sm-8 col-sm-offset-2" style="background-color:rgb(22, 21, 21,0.7)">
						<div class="panel-group">
						  	<div class=" panel-transparent" >
						    	
								<br>
									<br>
								<hr>
							    	<header>
							    	<h2>Passenger Details:</h2>
							    	<hr>
							    </header>
									<form action="booking2.php" method="get">
										<br>
										<div>
											<div class="input-group">
												<label>First name</label>
												<input type="text" name="fn" class="form-control trans-input-area" placeholder="First name" required>
											</div><br>
											<br>
											<div class="input-group">
												<label>Last name</label>
												<input type="text" name="ln" class="form-control trans-input-area" placeholder="Last name" required>
                                               
											</div>
										</div>
										<br>
										<br>
										<div>
											<div class="input-group">
												<label>Age</label>
												<input type="number" name="age" placeholder="00" class="form-control trans-input-area" required>
											</div>
											
										</div>
										<br>
										<br>
										<div>
											<div class="input-group">
												<label>City</label>
												<input type="text" name="city" placeholder="City" class="form-control trans-input-area" required>
											</div>
											
										</div>
										<br>
										<br>
										
										<div>
											<div class="input-group">
												<label for="class">Gender</label>
												<select name="gender" class="form-control trans-input-area">
												<option>Male</option>
												<option>Female</option>
												
												</select>
											</div>
											
										</div>
										<br>
										<br>
									<div class="input-group-btn">
									<input type="button" class="btn btn-primary trans-input-area" value="back" onclick="back()" style="width: 40%; float: left;">
									<button class="btn btn-primary trans-input-area" type="submit" style="width: 40%; float:right;" >Continue</button>
                                    
									</div>
                                    ';
                                    echo"
                                    <input type='hidden' name='fid' value={$fid}>
                                    <input type='hidden' id='h' name='seat' value={$s} >
									
									<br>
									<br>
									<br>
									<br>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				
			</div>
           <script>
		   function back()
		   {document.location='bookingDetail.php';
		   }
		   </script>
        

	
";

echo"
</body>
</html>";
}
else
{
    echo "<script>window.location='http://localhost/php%20project/cticket.php';</script>";
}

?>




