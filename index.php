<?php
 include 'menu2.html';
 ?>
<body style="background-color:#cdeeff">
<div class="col-xs-4">
</div>
<div class="col-xs-4">

<form action="index.php" method="POST">
<marquee><h2 align="center">Login as Staff</h2></marquee>

<br>Enter Username<br>
<input type="text" name="username" required="required" class="form-control" placeholder="Enter username"><br>
Password<br>
<input type="password" name="password" required="required" class="form-control" placeholder="Enter password"><br>
<input type="submit" name="submit" value="login"class="btn btn-success"><br><br>
</form>

<?php
//Login to the system submission to make attendence
include 'connect.php';
session_start(); 
if(isset($_REQUEST['submit'])){
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$querry="SELECT  `username`, `password`,`position` FROM staff where password='$password' and username='$username'";
$result=$conn->query($querry)or die(mysqli_error($conn));
$count=0;
if($result){
while($query_row=$result->fetch_assoc() ){
$count=1;
$_SESSION['username']=$query_row['username'];
$_SESSION['position']=$query_row['position'];


if($_SESSION['position']=='User'){
header( 'Location:allClients.php' ) ;
}

else if($_SESSION['position']=='Admin'){
header( 'Location:addUsers.php' ) ;
}else{
	echo 'Invalid username or Password';
}
}
echo 'Enter a valid username and Password';
}else{
die(mysql_error());	
}
}

?>
<h4>Are you a client? <a href="clogin.php">click here</a></a><br><br><br>
<h6 align="center">Designed by Arnould</h6>
</div>
<div class="col-xs-4">
</div>

</div>
<div id="footer">
<p><br>

</p>
</div>
</div>
</div>
</body>
</html>
