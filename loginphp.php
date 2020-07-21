<?php
$conn=mysqli_connect("localhost","root","","hungry");
$fn=$_POST['fname'];
$pw=$_POST['pwd'];
$_SESSION['username']=$fn;
$_SESSION['password']=$pw;
$name="donate";
$password="!@#$";
if($fn==$name && $pw==$password)
{
header("location:admin.html");
}
else
{
print '<script>alert("Incorrect Username or Password");</script>';
print '<script>window.location.assign("login.html");</script>';
}
mysqli_close($conn);
?>