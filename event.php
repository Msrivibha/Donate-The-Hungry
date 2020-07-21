<?php
$conn=mysqli_connect("localhost","root","","hungry");
$fname=$_POST['fname'];
$mnum=$_POST['mnum'];
$anum=$_POST['anum'];
$address=$_POST['address'];
$date=$_POST['date'];
$enum=$_POST['enum'];
$orphanname=$_POST['orphanname'];
$etime=$_POST['etime'];
$service=$_POST['service'];
$sql="insert into shareevent values('$fname','$mnum','$anum','$address','$date','$enum','$orphanname','$etime','$service')";
mysqli_query($conn,$sql);
$rc=mysqli_affected_rows($conn);
if($rc>0)
echo "Successfully submitted";
else
echo "Resubmit the form".mysqli_error($conn);
mysqli_close($conn);
?>
