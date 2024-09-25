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
<body style="background-color:white">
<div class="container">
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="extinguishers.php">Search</a>
</div>
<div>
<form action="extinguishers.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="left">Reports</h1>
<?php
include'connect.php';
$all="SELECT `fid`, `name`, `expiry_date`, `status` FROM `extinguishers` WHERE 1";
$invalid="SELECT `fid`, `name`, `expiry_date`, `status` FROM `extinguishers` WHERE status='Invalid'";
$valid="SELECT `fid`, `name`, `expiry_date`, `status` FROM `extinguishers` WHERE status='valid'";
$solid="SELECT `id`, `fid`, `company_id`, `status`, `date` FROM `distribution` WHERE 1";

$result1=$conn->query($all) or die(mysqli_error($conn));
$result2=$conn->query($invalid) or die(mysqli_error($conn));
$result3=$conn->query($valid) or die(mysqli_error($conn));
$result4=$conn->query($solid) or die(mysqli_error($conn));
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>Item</th><th>Details</th></tr>';

echo '<tr><td>All</td><td>';
echo mysqli_num_rows($result1);
echo '</td></tr>';

echo '<tr><td>Sold Fire Extinguishers</td><td>';
echo mysqli_num_rows($result4);
echo '</td></tr>';

echo '<tr><td>Remaining </td><td>';
echo mysqli_num_rows($result1)-mysqli_num_rows($result4);
echo '</td></tr>';

echo '<tr><td>Valid</td><td>';
echo mysqli_num_rows($result3);
echo '</td></tr>';

echo '<tr><td>Invalid</td><td>';
echo mysqli_num_rows($result2);
echo '</td></tr>';
echo '</table>';
 


?>
</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>