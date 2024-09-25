<?php
session_start();
if($_SESSION['position']=='Admin'){
}
else{
header( 'Location:index.php' ) ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Health Providers</title>
<head>



<div class="container" style="background-color:WHITE">
<img src="images/logo.jpg" width="1140px" height="100px">

<ul class="nav nav-tabs nav-justified" style="background-color:black";>
<li><a href="index.php">Home</a></li>
<li><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>

<li><a href="addClients.php">Add Clients</a></li>
<li><a href="allClients.php">Clients</a></li>

<li><a href="addFireExtinguisher.php">Add Ext</a></li>
<li><a href="extinguishers.php">Extinguishers</a></li>

<li><a href="distribute.php">Distribute</a></li>
<li><a href="distribution.php">Distribution</a></li>

<li><a href="logout.php">Logout</a></li>
</ul>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">update distr</h2>
<table border="0" align="center">

<form action="updatedistributions.php" method="POST">
<tr><td>
id<br>
<td/>
<input type="text" name="id" required="required" class="form-control" value="<?php if(isset($_GET['fidu'])){echo $_GET['fidu'];}?>"><br>
</td></tr>
<tr><td>
extinguisher fid<br>
<td/>
<input type="text" name="fid" required="required" class="form-control" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>"><br>
</td></tr>
<tr><td>
company_id<br>
<td/>
<input type="text" name="company_id" required="required" class="form-control" ><br>
</td></tr>

<tr><td>
date<br>
<td/>
<input type="date" name="date" required="required" class="form-control"><br>
</td></tr>

<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="send"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php

include 'connect.php';
if(isset($_GET['idd'])){
  $id=$_GET['idd'];
$querry="delete from distribution WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:distribution.php' ) ;
}
if(isset($_REQUEST['submit1'])){
//fields for department
$id=$_REQUEST['id'];
$fid=$_REQUEST['fid'];
$company_id=$_REQUEST['company_id'];
$date=$_REQUEST['date'];
$querry="UPDATE `distribution` SET `fid`='$fid',`company_id`='$company_id',`date`='$date' WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else {
echo "Querry run successifully";
}
}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>