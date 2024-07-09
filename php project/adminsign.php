


<?php
$user= $_POST['username'];
$pass1= $_POST['password1'];
$pass2= $_POST['password2'];
if($pass1==$pass2)
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
            $d =mysqli_query($conn,"select * from adminsign where email='".$user."'and pass='".$pass1."';");
            if(mysqli_num_rows($d)>0)
            {
                echo'<script>document.location="adminmain.html";</script>';
            }
            else
            {
               
                    echo'<script>alert("enter correct details");document.location="adminsign.html"; </script>';
                

            }
        }

    }

}
else{

    echo'<script>alert("password not match"); document.location="signin.html"; </script>';

   
}

?>
















