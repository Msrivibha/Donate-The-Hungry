<?php
session_start();
$conn=mysqli_connect("localhost","root","","hungry");
$fn=$_POST['fname'];
$pw=$_POST['pwd'];
$mn=$_POST['mnum'];
$em=$_POST['email'];
$an=$_POST['anum'];
$add=$_POST['address'];
$sql="select * from signup where fname='$fn'";
$result=mysqli_query($conn,$sql);
$rc=mysqli_num_rows($result);
if($rc>0)
{
echo "Username already exists";
}
else
{
$sql="insert into signup values('$fn','$pw','$mn','$em','$an','$add')";
mysqli_query($conn,$sql);
$count=mysqli_affected_rows($conn);
if($count>0)
echo "Registration successfully";
header("Location:list.html");
}
mysqli_close($conn);
?>
