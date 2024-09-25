<?php
session_start();
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User' ){
}
else{
header( 'Location:index.php' ) ;
}
?>
<?php
include 'menu.html';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>Notification</title>
<head>

<script type="text/JavaScript">
<!--
function AutoRefresh( t ) {
	setTimeout("location.reload(true);", t);
}
</script>
</head>

<div class="container" style="background-color:WHITE">
<body style="background-color:#cdeeff">
<body onload="JavaScript:AutoRefresh(6000);">
<p><h3>checking in progress.......</h3></p>
</body>
<hr>

<div class="progress progress-striped active">
<div class="progress-bar progress-bar-success" role="progressbar"
aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
style="width: 100%;">
<span class="sr-only">40% Complete</span>
</div>
</div> 



<?php
include 'functions.php';
include'connect.php';
$querry="SELECT `fid`, `distribution`.`company_id` ,`email` FROM `distribution`,`clients` WHERE `distribution`.`company_id`=`clients`.`company_id` ";
$result=$conn->query($querry);
if($result){
while($query_row=$result->fetch_assoc()){
	$email=$query_row['email'];
	$fid=$query_row['fid'];
	$days=getRemainingTime($fid,$conn);
    sendEmail($email,$days);
}}
else{
echo mysql_error();
}
function sendEMail($to,$days){
	$message='Dear Customer, You are remaining with '.$days;
	echo 'Notifying '.$to.'<br>';
	echo $message.'<br>';
	$message=wordwrap($message,70);
	mail($to,"Notification",$message);
	echo '<hr>';
}
?>
</body>
</html>