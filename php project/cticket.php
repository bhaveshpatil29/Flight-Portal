<?php
$x=0;
$y=0;
$fn=array();
$ln=array();
$fno=array();
$i=0;
$j=0;
$a=0;
$c=0;
$f1=array();
$msg="";


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
       
        $sql="select * from passenger where signno=".$_COOKIE['signid']." and flightno=".$_COOKIE["fid"];
        $data=mysqli_query($conn,$sql);
        if($data)
        {
            while($row=mysqli_fetch_assoc($data))
            {
              $flightno[$j]=$row['flightno'];
             if($j==0)
             {
              $fno[$a]=$flightno[$j];
                  $a++;
             }
             
              if($j>1)
              {
                if($flightno[$j-1]!= $flightno[$j])
                {
                  $fno[$a]=$flightno[$j];
                  $a++;

                  $i++;
                  $c=0;
                }

              }
              $fn[$i][$c]=$row['fname'];
              $ln[$i][$c]=$row['lname'];
              $j++;
              $c++;
               
                
               

            }
            
            $t=0;
             while($t<$a)
             {
             
              $sql="select * from flights where flightID=".$fno[$t].";";
              $data=mysqli_query($conn,$sql);
              if($data)
              {
                  while($row=mysqli_fetch_assoc($data))
                  {
                      $fname[$t]=$row['airlineName'];
                      $fl[$t]=$row['fromLocation'];
                      $tl[$t]=$row['toLocation'];
                      $dd[$t]=$row['departureDate'];
                      $dt[$t]=$row['departureTime'];
                      $ad[$t]=$row['arrivalDate'];
                      $at[$t]=$row['arrivalTime'];
                   
  
                  }
              }
              else
              {
                  echo mysql_error($conn);
              }
              $t++;
             }
           
        }
        else
        {
            echo mysql_error($conn);
        }
           
 
    }

}

echo'
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="t.css">
</head>
<body>
<style>
.btn{
  text-align:center;
  
  width:1600px;
  height:100px;
  margin:30px;
  
}
.button{
  color:white;
  
  background:#e24a4a;
  border:none;
  font-size:16px;
  margin:5px 17px;
  padding: 10px 32px;
}
body{
background-image: url(airline.jpg);
background-size: cover;
  background-repeat: no-repeat;
}

</style>
';



while($y<$t)
{
echo "
  <div class='boarding-pass' >
    <div class='boarding-pass-header clearfix'>
      <h2 class='title'>Your Itinerary</h2>
    </div>
    <div class='boarding-pass-flight'>
    
    
      <ul class='clearfix'>
        <li>
        <span class='country'>From:</span>
          <h2>{$fl[$y]}</h2>";
         
          echo "
        </li>
       
        <li>
        
        <span class='country'>To:</span>
        
          <h2>{$tl[$y]}</h2>";
        
          echo "
        </li>
      
      </ul>
    </div>
    <div class='boarding-pass-details'>
      <ul class='clearfix'>
        <li>
          <h4>Departure Date</h4>
          <span>{$dd[$y]}</span>";
         
          echo "
        </li>
        <li>
          <h4>Departure Time</h4>
          <span>{$dt[$y]}</span>";
          
          echo "
        </li>
        <li>
          <h4>Arrival Date</h4>
          <span>{$ad[$y]}</span>";
         
          echo "
        </li>
        <li>
          <h4>Arrival Time</h4>
          <span>{$at[$y]}</span>";
        
          echo "
        </li>
      </ul>
    </div>
    <div class='boarding-pass-body'>
      <div class='passenger'>
        <h4>passenger</h4>
        ";
        while($x<count($fn[$y]))
        {
          
           echo" <span>{$fn[$y][$x]} {$ln[$y][$x]}</span><br>";
           $msg=$msg.$fn[$y][$x].$ln[$y][$x];
           $x++;
        }
       echo " 
      </div>
      <ul class='clearfix'>
        <li>
          <h4>flight name</h4>
          <span>{$fname[$y]}</span>";
        
          echo "
        </li>
        <li>
          <h4>Flight no</h4>
          <span>{$fno[$y]}</span>";
         
          echo "
        </li>
        
      </ul>
    </div>
   
  </div>
  <div class='btn'>
  <form action='ticketemail.php' method='get'>
<input type='hidden' name='fid' value=$fno[$y]>
<input type='hidden' name='fname' value=$fname[$y]>
<input type='hidden' name='at' value=$at[$y]>
<input type='hidden' name='ad' value=$ad[$y]>
<input type='hidden' name='dt' value=$dt[$y]>
<input type='hidden' name='dd' value=$dd[$y]>
<input type='hidden' name='to' value=$tl[$y]>
<input type='hidden' name='from' value=$fl[$y]>
  <button class='button' name='email' value=$msg>Done</button>
  </form>
  <form action='ticketcancle.php'>

  <button class='button' name='fid' value=$fno[$y]>Cancle</button>
  </form>
  </div><br><br><br>";
  $y++;
  $x=0;
      }
      echo"
</body>
</html>";


?>


