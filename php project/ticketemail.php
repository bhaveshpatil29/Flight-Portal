<?php





    $conn=mysqli_connect("localhost:3306","root","abc123");
    if(!$conn)
    {
        die("error".mysql_error());
    }
    else
    { 
        if(! mysqli_select_db($conn,"airline"))
        {}
        else
        {
          
            $sql="select email from signup where no=".$_COOKIE['signid'].";";
            $d=mysqli_query($conn,$sql);
        
           while($row=mysqli_fetch_assoc($d)) 
           {$to=$row['email'];}
            
        
        }

    }






$msg="flight id=".$_GET['fid']."\nFlight Name=".$_GET['fname']."\nFrom : ".$_GET['from']."\nTo : ".$_GET['to']."\nDeparture Date:".$_GET['dd']."\nDeparture Time:".$_GET['dt']."\nArrival Date:".$_GET['ad']."\nArrival Time:".$_GET['at']."\nname:".$_GET['email'];


    
    $head="Ticket booked  ";
    
    if(mail($to,$head,$msg,"From:nandinichaudhari111@gmail.com"))
    {
        echo'<script>document.location="success.html";</script>';
    }
    else
    {
        echo'<script>alert("unsend");</script>';
    }


 ?>