<?php
$fid= $_GET['fid'];
$signno= $_COOKIE['signid'];

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
            $sql1="delete from passenger where signno='".$signno."' and flightno=".$fid.";";
            
            if(mysqli_query($conn,$sql1)) 
            {
                
                
               echo'<script>document.location="flightDetails.php";</script>';
            }
            else
            {
                 
                    echo'<script>alert("unsuccess ");document.location="ticket.php";</script>';
                

            }
        }

    }



?>