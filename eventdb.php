<html>
<style type="text/css">
body{
      background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(adminbg.png);
      
}
th,td{
       color:white;
       font-family:Century Gothic;
       font-size:25px;
       padding:12px;
       border-bottom:3px solid #ddd;
       
}
table{
      width:100%;
      border-collapse:collapse;
}
       
th
{
      height:50px;
      color:white;
      vertical-align:top;
      text-align:left;
      background-color:#000000;
}
td
{
width:30px;
height:60px;
font-size:24px;
vertical-align:bottom;
}
tr:hover
{
          background-color:#000000;
}
</style>
<body>
<button align="left" onclick="goBack()">Back</button>
<script>
function goBack()
{
window.location.assign("admin.html");
}
</script>
<table>
<tr>
<th>Name</th>
<th>Mobile Number</th>
<th>Aadhar Number</th>
<th>Address</th>
<th>Date</th>
<th>Event Name</th>
<th>Orphanage Name</th>
<th>Event Time</th>
<th>Service</th>
</tr>
<?php
$conn=mysqli_connect("localhost","root","","hungry");
$sql="select * from shareevent";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
if($total>0)
{
while($result=mysqli_fetch_assoc($data))
{
echo "<tr>
<td>".$result['fname']."</td>
<td>".$result['mnum']."</td>
<td>".$result['anum']."</td>
<td>".$result['address']."</td>
<td>".$result['date']."</td>
<td>".$result['enum']."</td>
<td>".$result['orphanname']."</td>
<td>".$result['etime']."</td>
<td>".$result['service']."</td>
</tr>";
}
echo "</table>";
}
else
{
echo "No entries found";
}
mysqli_close($conn);
?>
</table>
</body>
</html>
