<?php
include 'menu.html';
?>

<body style="background-color:white">
<div class="container">
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="distribution.php">Search</a>
</div>
<div>
<form action="distribution.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">Distribution</h1>
<?php
session_start();
include 'functions.php';
include'connect.php';

$querry="SELECT `id`, `fid`, `company_id`, `status`, `date` FROM `distribution` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `id`, `fid`, `company_id`, `status`, `date` FROM `distribution` 
         WHERE  id='$search' or fid='$search' or company_id='$search'or status='$search' or date='$search' ";
}
if(isset($_SESSION['company_id'])){
	
	$company_id=$_SESSION['company_id'];
	$querry="SELECT `id`, `fid`, `company_id`, `status`, `date` FROM `distribution`  WHERE   company_id='$company_id'";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>id</th><th>Fire Ex Id</th><th>Company Id</th><th>Taken On </th><th>Remaining Days</td><th>Status</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$fid=$query_row['fid'];
$company_id=$query_row['company_id'];
$date=$query_row['date'];
$status=$query_row['status'];
if(getRemainingTime($fid,$conn)<0){
//echo '<tr style="color:red">';
echo '<tr  class="danger" >';
}else{
//echo '<tr   style="color:blue" >';
echo '<tr  class="success" >';
}
echo '<td>';
echo $id;
echo '</td>';

echo '<td>';
echo $fid;
echo '</td>';

echo '<td>';
echo $company_id;
echo '</td>';

echo '<td>';
echo $date;
echo '</td>';

echo '<td>';
echo getRemainingTime($fid,$conn);
echo '</td>';

echo '<td>';
echo $status;
echo '</td>';

echo '<td>';
if(isset($_SESSION['position']))
if($_SESSION['position']=='Admin'||$_SESSION['position']=='User' ){
echo '<a href='."updatedistribution.php?fid=$fid&company_id=$company_id&id=$id&date=$date".'>'.'Update&nbsp'.'</a>';
echo '<a href='."delete.php?fidd=$fid".'>'.'&nbspDelete'.'</a>';
}

echo '<a href='."approve.php?fida=$fid".'>'.'&nbspApprove'.'</a>';
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
