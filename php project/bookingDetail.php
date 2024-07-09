<?php

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
        $fid=$_GET['t1'];
       
        $sql="select * from flights where flightID=".$fid.";";
        setcookie("fid",$fid);

       
        $data=mysqli_query($conn,$sql);
           

                         
							$sql1="select COUNT(flightno) as tf from passenger where flightno=$fid";
							
							$selectdata=mysqli_query($conn,$sql1);
							$tf=mysqli_fetch_assoc($selectdata);
							
							
 
    }

}
echo '<!DOCTYPE HTML>

<html>
	<head>
		<title>Booking</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">

                <link rel="stylesheet" href="mycss1.css">
	</head>
	<style type="text/css">
		label{
			color: white;
		}
        
	  header{
        color: white;
		}
	
	</style>
	<body>
				
				
				

				<div class="background-wrapper" style="background-image: url(airline.jpg);">
				
				<!--header-->

				<div class="container-fluid" >
					<header>
						<h2></h2>
						
					</header>


                      <form method="get" action="booking2.php" onsubmit="return openNew()">
					<!--panel-->
					<div class="col-sm-8 col-sm-offset-2" style="background-color:rgb(22, 21, 21,0.7)">
						<div class="panel-group">
						  	<div cla0ss=" panel-transparent" >
						    	
								<br>
									<br>
								<hr>
							    	<header >
							    	<h2>Flight Details:</h2>
							    	<hr>
							    </header>
                               
										<br>
';
                     if($data)
                    {
                        while($row=mysqli_fetch_assoc($data))
                        {
                            $p=$row['price'];
                            $totalseats=$row['seats'];
                            echo"
                            <div>
                              &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  
                                <div class='input-group'>
                                    <label>Flight name : {$row['airlineName']} </label>
                                &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                                                             
                                <label >Flight ID : {$row['flightID']} </label>
                                <input type='hidden' name='fid' value={$row['flightID']}>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div>
                            &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                                <div class='input-group'>
                                    <label>From : {$row['fromLocation']} </label>
                                &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                                
                                <label>To : {$row['toLocation']} </label>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div>
                            &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                                <div class='input-group'>
                                    <label>Departure Date : {$row['departureDate']} </label>
                               &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  
                                
                                <label>Time : {$row['departureTime']} </label>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div>
                            &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                            <div class='input-group'>
                                <label>Arrival Date : {$row['arrivalDate']} </label>
                           &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  
                            
                            <label>Time : {$row['arrivalTime']} </label>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div>
                        &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp 
                            <div class='input-group'>
                                <label>seats</label>
                                <input type='text' onkeyup='fun(this.value)' id='s' name='seat' class='form-control trans-input-area' placeholder='0' >
                            </div>&nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp &nbsp&nbsp  &nbsp&nbsp  
                            <div class='input-group'>
                                <label>Price</label>
                                <input type='text' id='p1' class='form-control trans-input-area' placeholder='0'    >
                            </div>
                        </div>'
                        <br>
                        ";
                        }
                    
                    }
                    else
                    {
                       
        
                    }

echo '<div class="input-group-btn">
<input type="button" value="back"  class="btn btn-primary trans-input-area" onclick="back()" style="width: 40%; float: left;">
<button class="btn btn-primary trans-input-area" id="sbtn" type="submit" style="width: 40%; float:right;" >fill</button>

</div>


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
';
echo"
<script>
function back()
{
    document.location='flightDetails.php';
}
function fun(v)
{
";
    $s=$totalseats-$tf['tf'];
    echo"
    if($s>=v)
    {
   document.getElementById('p1').value={$p}*v;
   document.getElementById('sbtn'). disabled=false;
    }
    else
    {
        alert('enter valid seats');
        document.getElementById('sbtn'). disabled=true;
    }
  
   
}
function openNew()
{
    if(document.getElementById('s').value=='')
    {
       
       alert('fill');
       return false;
    }
}

</script>

</body>
</html>

";



?>



									