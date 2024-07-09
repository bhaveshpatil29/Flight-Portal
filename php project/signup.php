<?php

$fn= $_GET['firstname'];
$ln= $_GET['lastname'];
$pass= $_GET['password'];
$email= $_GET['emailid'];
$mob= $_GET['mobile'];
$email_reg='/^\w{1,}@\w{2,6}\.[a-z]{2,3}$/';
$mob_reg='/^[7-9]{1}[0-9]{9}$/';
if(preg_match($email_reg,$email))
{
    if(preg_match($mob_reg,$mob))
    {
    
        
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
            $d =mysqli_query($conn,"select * from signup where email='".$email."';");
            if(mysqli_num_rows($d)>0)
            {
                echo'<script>alert("Already Exist");</script>';
                echo "<script>window.location='http://localhost/php%20project/sign.html';</script>";
            }
            else
            {
                $count =mysqli_query($conn,"select * from signup ;");
                $r=mysqli_num_rows($count);
                $r++;
                $sql="insert into signup values(".$r.",'".$fn."','".$ln."','".$pass."','".$email."',".$mob.");";
                
                $data=mysqli_query($conn,$sql);
                if($data)
                {
                   
                    setcookie("signid",$r);
                    
                    echo'<script>alert("success");</script>';
                     echo "<script>window.location='http://localhost/php%20project/flightDetails.php';</script>";
                }
                else
                {
                    die("error".mysqli_error($conn));
    
                }
    
            }
        }
    
    
    }
    }
    else
    {
        echo'<script>alert("enter valid mobile no");</script>';
        echo "<script>window.location='http://localhost/php%20project/sign.html';</script>";
    }
}
else
{
    echo'<script>alert("enter valid email");</script>';
    echo "<script>window.location='http://localhost/php%20project/sign.html';</script>";
}



?>
