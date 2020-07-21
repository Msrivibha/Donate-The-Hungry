<?php
$conn=mysqli_connect("localhost","root","","hungry");
$fname=$_POST['fname'];
$mnum=$_POST['mnum'];
$anum=$_POST['anum'];
$address=$_POST['address'];
$date=$_POST['date'];
$foodnum=$_POST['foodnum'];
$sql="insert into foodform values('$fname','$mnum','$anum','$address','$date','$foodnum');";
mysqli_query($conn,$sql);
$rc=mysqli_affected_rows($conn);
if($rc>0)
echo "Successfully submitted";
else
echo "Resubmit the form".mysqli_error($conn);
mysqli_close($conn);
?>
