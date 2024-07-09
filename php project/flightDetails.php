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
       
        $sql="select * from flights";
        $data=mysqli_query($conn,$sql);
           
 
    }

}
echo'<!DOCTYPE HTML>

<html>
	<head>
		<title>Manager</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">

		
	</head>
<style>
body{
	background: url("airline.jpg");
	background-size: cover;
	background-repeat: no-repeat;
      }

	    
	  .container-fluid{
		margin: 0 auto;
		width: 800px; padding: 20px;
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 25px;
		font-family: sans-serif;
		background-color: rgba(21, 21, 23, 0.4);
		opacity: 0.7;
	
	  }
	  #table1 tr:hover {background-color: #ddd;color:black;}

#table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  border-bottom: 1px solid white;
  border-top: 1px solid white;
  
  color: white;
}
td {
	height: 50px;
	
  }
table {
	border-collapse: collapse;
	width: 100%;
  }
  .btn{
	margin-top: 32px;
	margin-left: 32px;
  }
</style>
	<body >
	<button class="btn" onclick="funopen()">show ticket</button>
				
			<div class="container-fluid" style="width: 100%">
			<h2>Flights</h2>
			<br>
			
		  	
			<form action="bookingDetail.php" method="get">
			  	<table id="table1">
				 
				    <thead>
					    <tr>
					    	<th>#</th>
					        <th>FlightNo</th>
					        <th>From</th>
					        <th>To</th>
					        <th>Departure Date</th>
					        <th>Time</th>
					        <th>Arrival Date</th>
                            <th>Arrival Time</th>
					        <th>Avaible seats</th>
					        <th>price</th>
					    </tr>
						
					
				    <tbody>';
                    if($data)
                    {
                        while($row=mysqli_fetch_assoc($data))
                        {
							$fno1=$row['flightID'];
							$sql1="select COUNT(flightno) as tf from passenger where flightno=$fno1";
							
							$selectdata=mysqli_query($conn,$sql1);
							$tf=mysqli_fetch_assoc($selectdata);
							
							$s=$row['seats']-$tf['tf'];
							
							if($s==0)
							{
								continue;
							}
                            echo"
					    <tr>
					    	<td>1</td>
					    	<td>{$row['flightID']}</td>
					        <td>{$row['fromLocation']}</td>
					        <td>{$row['toLocation']}</td>
					       

					        <td>{$row['departureDate']}</td>
					        <td>{$row['departureTime']}</td>
					        <td>{$row['arrivalDate']}</td>
					        <td>{$row['arrivalTime']}</td>
							<td>{$s}</td>
                            <td>{$row['price']}</td>
					        
					        <td>
						  	<div class='btn-group-vertical'>
							
								<button class='btn btn-primary' name='t1'  value={$row['flightID']}>Book</button>
								
							</div>
					  		</td>
					    </tr>
                        ";
                        }
                    
                    }
                    else
                    {
                       
        
                    }
                   
                        echo'
					   
				    </tbody>
			  </table>

			  <ul class="pagination">
					  <li><a href="#">&laquo;</a></li>
					  <li><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li><a href="#">&raquo;</a></li>
					</ul>
				</form>
			</div>	
			<script>
			function funopen()
			{
				window.location=`http://localhost/php%20project/ticket.php`;
			}
			</script>
	</body>
	
</html>';
?>

