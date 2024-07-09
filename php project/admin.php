<?php
if(!empty($_GET['airlinename'])&&!empty($_GET['flightid'])&&!empty($_GET['fromlocation'])&&!empty($_GET['tolocation'])&&!empty($_GET['totalseats'])&&!empty($_GET['departuredate'])&&!empty($_GET['departuretime'])&&!empty($_GET['arrivaldate'])&&!empty($_GET['arrivaltime'])&&!empty($_GET['price']))
{


$an= $_GET['airlinename'];
$fId= $_GET['flightid'];
$fromLoc= $_GET['fromlocation'];
$toLoc= $_GET['tolocation'];
$seat= $_GET['totalseats'];
$depDate= $_GET['departuredate'];
$depTime= $_GET['departuretime'];
$arrDate= $_GET['arrivaldate'];
$arrTime= $_GET['arrivaltime'];
$price= $_GET['price'];
$date=date("Y-m-d");
if($date>$depDate)
{
   
   echo"<script>alert('enter valid departure date');window.location.replace('admin.html');</script>";
}
else
{
    if($arrDate<$depDate)
{
    echo"<script>alert('enter valid arrival date');window.location.replace('admin.html');</script>";
}
else
{


$conn=mysqli_connect("localhost:3306","root","abc123");
if(!$conn)
{
    echo"fail";
     die("error".mysql_error());
}
else
{
    
    if(! mysqli_select_db($conn,"airline"))
    {
      
        echo "fail";

    }
    else
    {
        $sqls="select * from flights where flightId=".$fId.";";
        $d=mysqli_query($conn,$sqls);
        if(mysqli_num_rows($d)>0 )
        {
            echo'<script>alert("flight are already available");document.location="adminsign.html"; </script>';
       
       
        }
        else{
         
            $sql="insert into flights values('".$an."',".$fId.",'".$fromLoc."','".$toLoc."',".$seat.",'".$depDate."','".$depTime."','". $arrDate."','". $arrTime."',". $price.");";
            $data=mysqli_query($conn,$sql);
                if($data)
                {
                    
                    echo"<script>window.location.replace('adminmain.html');</script>";
                
                }
                else
                {
                     echo"<script>window.location.replace('admin.php');</script>";
    
                }

        }
 
    }

}
}

}

}
else{
    echo"<script>alert('enter details');window.location.replace('admin.html');</script>";

}
?>