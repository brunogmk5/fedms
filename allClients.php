<?php

session_start();
if($_SESSION['position']=='Admin' ||$_SESSION['position']=='User'){
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
<script type="text/javascript" src="printer.js"></script>
<title>HEALTH PROVIDER DETAILS</title>
<head>
<?php
include 'menu.html';
?>

<div class="container">

<body style="background-color:white">
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="#">Search</a>
</div>
<div>
<form action="allclients.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">list clients</h1>

<?php
include'connect.php';
$querry="SELECT `company_id`, `firstname`, `lastname`, `telephone`,`email`, `company_name`, `location`, `password` FROM `clients` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `company_id`, `firstname`, `lastname`, `telephone`,`email`, `company_name`, `location`, `password` FROM `clients`
              WHERE  company_id='$search' or firstname='$search' or lastname='$search' or telephone='$search' 
			  or company_name='$search' or location='$search' or password='$search'";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>Company name</th><th>company id</th><th>first Name</th><th>last Name</th>
                             <th>Telephone</th> <th>Email</th><th>Location</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$company_name=$query_row['company_name'];
$company_id=$query_row['company_id'];
$firstname=$query_row['firstname'];
$lastname=$query_row['lastname'];
$telephone=$query_row['telephone'];
$email=$query_row['email'];
$location=$query_row['location'];
echo '<tr>';
echo '<td>';
echo $company_name;
echo '</td>';

echo '<td>';
echo $company_id;
echo '</td>';

echo '<td>';
echo $firstname;
echo '</td>';

echo '<td>';
echo $lastname;
echo '</td>';

echo '<td>';
echo $telephone;
echo '</td>';

echo '<td>';
echo $email;
echo '</td>';

echo '<td>';
echo $location;
echo '</td>';
echo '<td>';
echo '<a href='."updateClient.php?cidu=$company_id&company_name=$company_name&firstname=$firstname&lastname=$lastname&company_name=$company_name&telephone=$telephone&location=$location".'>'.'Update&nbsp'.'</a>';
echo '<a href='."updateClient.php?cidd=$company_id".'>'.'&nbspRemove'.'</a><br>';
echo '</td>';
echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';

?>

</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>