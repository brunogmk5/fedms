<!DOCTYPE html>
<html class=" js no-touch" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Fire Extinguisher Distribution Mgt System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your page description here">
    <meta name="author" content="">
    <!-- css -->
    <link href="css/menu.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script type="text/javascript" src="printer.js"></script>
</head>
<body>
<div style="background:#999; font-size:22px; text-align:center; line-height:50px; color:#FFF; font-weight:bold;">
Fire Extinguisher Distribution Management System
</div>
	<!-- start header -->
<header>	
<div class="container">
<div class="navbar navbar-static-top">
<div class="navigation">
<nav background='blue'>
<ul class="nav topnav bold">
<ul class="dropdown-menu">
<li><a href="addUsers.php">Add Users</a></li>
<li><a href="allUsers.php">Staffs</a></li>
</ul>
</li>
<li><a href="index.php">Login as Staff</a></li>
<li><a href="clogin.php">Login as Client</a></li></li>

</nav>
</div>
<!-- end navigation -->
</div>
</div>
</div>
</div>
</header>	
<script src="js/jquery.js"></script>
<script src="js/custom.js"></script>
<div class="container">
<div class="row">
<div class="col-xs-3">
ibigomba kujya hano bitaha
</div>
<div class="col-xs-6">
<form>
<br>
Enter Name
<input type="text" name="name" class="form-control" required>
Enter Email
<input type="email" class="form-control">
Enter Date
<input type="date" class="form-control">
<input type="submit" name="submit" class="btn btn-sm btn-primary">
</form>
<?php
if(isset($_REQUEST['submit'])){
	$name=$_REQUEST['name'];
	if($name=='GOD'){
		echo 'We dont want you!!!';
	}
}
$age=45;
echo '<h1>'.$age.'</h1>';
?>
</div class="col-xs-3">
<div>
</div>

</div>
</div>
</body>
</html>