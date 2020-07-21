<?php
$conn=mysqli_connect("localhost","root","","hungry");
$fname=$_POST['fname'];
$pwd=$_POST['pwd'];
$mnum=$_POST['mnum'];
$email=$_POST['email'];
$anum=$_POST['anum'];
$address=$_POST['address'];
$sql="insert into signup values('$fname','$pwd','$mnum','$email','$anum','$address')";
mysqli_query($conn,$sql);
$rc=mysqli_affected_rows($conn);
if($rc>0)
echo "Successfully submitted";
else
echo "Resubmit the form".mysqli_error($conn);
mysqli_close($conn);
?>
