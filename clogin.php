<?php
 include 'menu2.html';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>HEALTH PROVIDER DETAILS</title>
<head>



<div class="container" style="background-color:#FFFFFF">
<body style="background-color:#cdeeff">
<div class="col-xs-4">
</div>
<div class="col-xs-4">

<form action="clogin.php" method="POST">
<h4 align="center">Login As Client</h4>

<br>company_id<br>
<input type="text" name="company_id" required="required" class="form-control" placeholder="Enter Company Id"><br>
Password<br>
<input type="password" name="password" required="required" class="form-control" placeholder="Enter password"><br>
<input type="submit" name="submit" value="login"class="btn btn-success"><br><br>
</form>

<?php
//Login to the system submission to make attendence
session_start();
include 'connect.php';  
if(isset($_REQUEST['submit'])){
$company_id=$_REQUEST['company_id'];
$password=$_REQUEST['password'];
$querry="SELECT company_name,company_id from clients WHERE company_id='$company_id' and password='$password'";

	$resultl=$conn->query($querry);
	if($resultl){
	while($row=$resultl->fetch_assoc()){
		$company_name=$row['company_name'];
	    $company_id=$row['company_id'];
		$_SESSION['company_id']=$company_id;
	    $_SESSION['position']='client';
		header("location:distribution.php");	
	}
	
	}else {
	
}

}
?>
</div>
<div class="col-xs-4">
</div>
</div>
<div id="footer">
<p><br>
<h6 align="center">Designed by Arnould</h2>
</p>
</div>
</div>
</div>
</body>
</html>