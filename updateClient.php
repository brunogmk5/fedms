<?php
session_start();
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User'){
}
else{
header( 'Location:index.php' ) ;
}
?>
<?php
include 'menu.html';
?>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">update Client</h2>
<table border="0" align="center">

<form action="updateClient.php" method="POST">
<tr><td>
Company name<br>
<td/>
<input type="text" name="company_name" required="required" class="form-control" value=" <?php if(isset($_GET['company_name'])){echo $_GET['company_name'];}?>"><br>
</td></tr>
<tr><td>
company id<br>
<td/>
<input type="text" name="company_id" required="required" class="form-control" value=" <?php if(isset($_GET['cidu'])){echo $_GET['cidu'];}?>"><br>
</td></tr>
<tr><td>
first name<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control" value=" <?php if(isset($_GET['firstname'])){echo $_GET['firstname'];}?>"><br>
</td></tr>

<tr><td>
last Name<br>
<td/>
<input type="text" name="lastname" required="required" class="form-control" value=" <?php if(isset($_GET['lastname'])){echo $_GET['lastname'];}?>"><br>
</td></tr>

<tr><td>
Telephone<br>
<td/>
<input type="text" name="telephone" required="required" class="form-control" value=" <?php if(isset($_GET['telephone'])){echo $_GET['telephone'];}?>"><br>
</td></tr>
<tr><td>
Email<br>
<td/>
<input type="text" name="email" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Location<br>
<td/>
<input type="text" name="location" required="required" class="form-control" value=" <?php if(isset($_GET['location'])){echo $_GET['location'];}?>"><br>
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
<input type="SUBMIT" name="update" value="update" required="required" class="btn btn-success" ><br>
</td></tr>
</table>
</form>

<?php
include 'connect.php';

if(isset($_GET['cidd'])){
$company_id=$_GET['cidd'];
$querry="delete from clients WHERE company_id='$company_id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:allClients.php' ) ;
}
	
if(isset($_REQUEST['update'])){
//fields for department

$company_name=$_REQUEST['company_name'];
$company_id=trim($_REQUEST['company_id']);
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$telephone=trim($_REQUEST['telephone']);
$email=$_REQUEST['email'];
$location=$_REQUEST['location'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];

if(!validatePhone($telephone)){
	//echo $telephone;
	echo 'Invalid Phone Number';
	return;
}

if($password==$password2){
$querry="UPDATE clients SET firstname='$firstname',company_name='$company_name',location='$location',password='$password',telephone='$telephone',email='$email',lastname='$lastname',password='$password' WHERE company_id='$company_id'";
$result=$conn->query($querry);
echo $result;
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
	//echo $numberOfDigits;
    if ($numberOfDigits == 7 or $numberOfDigits >= 10) {
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