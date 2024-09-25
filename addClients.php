<?php
session_start();
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User' ){
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
<title>Register Clients</title>
<head>

<div class="container" style="background-color:WHITE">
<?php
include 'menu.html';
?>

<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Register Client</h2>
<table border="0" align="center">

<form action="addClients.php" method="POST">
<tr><td>
Company Id<br>
<td/>
<input type="text" name="company_id" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Firstname<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Lastname<br>
<td/>
<input type="text" name="lastname" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Company Name<br>
<td/>
<input type="text" name="company" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Telephone<br>
<td/>
<input type="text" name="telephone" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Email<br>
<td/>
<input type="text" name="email" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Location<br>
<td/>
<input type="text" name="location" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Password<br>
<td/>
<input type="password" name="password1" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Re-type Password<br>
<td/>
<input type="password" name="password2" required="required" class="form-control"><br>
</td></tr>

<tr><td></td>
<td>
<input type="SUBMIT" name="send" value="Add Client"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['send'])){
//fields for department
$company_id=$_REQUEST['company_id'];
$location=$_REQUEST['location'];
$telephone=$_REQUEST['telephone'];
$email=$_REQUEST['email'];
$company_name=$_REQUEST['company'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
if(!validatePhone($telephone)){
	echo 'Invalid Phone Number';
	return;
}

include 'connect.php';;
if($password==$password2){
$querry="INSERT INTO `clients`(`company_id`, `firstname`, `lastname`, `telephone`,`email`, `company_name`, `location`,`password`) 
                        VALUES ('$company_id','$firstname','$lastname','$telephone','$email','$company_name','$location','$password')";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else
echo "Querry run successifully";
}
else{
echo "Password does not match";
}}
?>
<?php
function validatePhone($string) {
    $numbersOnly = preg_replace("[^0-9]", "", $string);
    $numberOfDigits = strlen($numbersOnly);
    if ($numberOfDigits == 7 or $numberOfDigits == 10) {
        //echo $numbersOnly;
		return true;
    } else {
       // echo 'Invalid Phone Number';
		return false;
    }
}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>