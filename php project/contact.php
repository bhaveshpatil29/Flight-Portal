<style>
table {
    width: 100%;
}

th{
   height: 50px;
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
    padding: 15px;
    text-align: left;
  background-color: #4CAF50;
color: white;
}

td {
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
    padding: 15px;
    text-align: left;

}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>


<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;

}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #0b100c;
}

body{
  background: url("airline.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.wrapper{
      margin: 0 auto;
  width: 350px; padding: 20px;
  display: block;
  color: white;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 25px;
  font-family: sans-serif;
}
/*.corners {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;

}
*/

textarea{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    
}

input[type=text],[type=number],[type=email]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color:  #111;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color:black;
}
</style>


</head>
<body>

<ul>
  <li><a  href="home.html">Home</a></li>
  <li><a href="signin.html">Sign In</a></li>
  <li><a href="adminsign.html">Admin</a></li>
  <li><a class="active" href="contact.html">Contact</a></li>
  <li><a href="about.html">About</a></li>
  <li style="float: left; color:white;font-family: sans-serif;font-size: 35px;">IndiGo</li>
</ul>

<div class="wrapper">
<form method="get">

  Name:  <input type="text" name="name" required></input><br><br>
  Mobile No: <input  type="number" maxlength="10" name="mob_no" required></input><br><br>
  Email Id:  <input type="email" placeholder="Enter email..." name="email"></input><br><br>
  Feedback: <br><textarea  rows="20" cols="20" placeholder="Any suggestions or complaints...." name="feedback"></textarea><br><br>

  <input type="submit" value="Send Message"></input>


</form>
</div>


</body>
</html>
<?php

$name = $_GET['name'];
$mob = $_GET['mob_no'];
$email = $_GET['email'];
$fed = $_GET['feedback'];

if($name!='')
{
    $to="cnandini421@gmail.com";
    
    $head="from ".$name;
    
    if(mail($to,$head,$fed,"From:nandinichaudhari111@gmail.com"))
    {
        echo'<script>document.location="success.html";</script>';
    }
    else
    {
        echo'<script>alert("unsend");</script>';
    }
}


 ?>