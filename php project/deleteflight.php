


<?php
$fid= $_POST['fid'];
$fn= $_POST['fn'];

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
            $sql="select * from flights where airlineName='".$fn."' and flightID=".$fid.";";
            $d=mysqli_query($conn,$sql);
            if(mysqli_num_rows($d)>0 )
            {
                $flight_detail=mysqli_fetch_assoc($d);
                $from=$flight_detail['fromLocation'];
                $tol=$flight_detail['toLocation'];
              
                $sql1="delete from flights where airlineName='".$fn."' and flightID=".$fid.";";
                $d4=mysqli_query($conn,$sql1);


                $sign="select signno from passenger where flightno=".$fid.";";
                $d1=mysqli_query($conn,$sign);
                $signno=mysqli_fetch_assoc($d1);
                $ss=$signno['signno'];

                $sql_detetepassenger="delete from passenger where flightno=".$fid.";";
                $d3=mysqli_query($conn,$sql_detetepassenger);
               

                $e= "select * from signup where no=".$ss.";";
               
                $d2=mysqli_query($conn,$e);
                $email1=mysqli_fetch_assoc($d2);
                $to=$email1['email'];
              
                

                
                $head="Flight cancle ";
                $msg="flight no= ".$fid."\nfrom :".$from."   to : ".$tol."\n!!!!Ticket cancled!!!!";
                mail($to,$head,$msg,"From:cnandini421@gmail.com");
               
            
             echo'<script>document.location="success.html";</script>';
            }
            else
            {
                echo $sql;
                
                    echo'<script>alert("flight not found ");document.location="deletefight.html";</script>';
                

            }
        }

    }



?>
















