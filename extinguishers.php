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
<div class="container">

<body style="background-color:white">
<div>
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
<h1 align="center">Fire Extinguishers</h1>
<?php
include'connect.php';
$querry="SELECT `fid`, `name`, `expiry_date`, `status` FROM `extinguishers` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `fid`, `name`, `expiry_date`, `status` FROM `extinguishers`  WHERE  name='$search' or   
                           fid='$search' or status='$search' or expiry_date='$search'";
}
$result=$conn->query($querry);
echo "Showing ".mysqli_num_rows($result)."  Results";
echo '<table border="1" id="tableorders" class="table table-dark">';
echo '<tr><th>F id</th><th>Name</th><th>Expiry Date </th><th>Status</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$fid=$query_row['fid'];
$name=$query_row['name'];
$expiry_date=$query_row['expiry_date'];
$status=$query_row['status'];
echo '<tr>';
echo '<td>';
echo $fid;
echo '</td>';

echo '<td>';
echo $name;
echo '</td>';

echo '<td>';
echo $expiry_date;
echo '</td>';

echo '<td>';
echo $status;
echo '</td>';

echo '<td>';
echo '<a href='."updateExtinguisher.php?fidu=$fid&name=$name".'>'.'Update&nbsp'.'</a>';
echo '<a href='."updateExtinguisher.php?fidd=$fid".'>'.'&nbspRemove'.'</a><br>';
echo '</td>';
echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);


?>
</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>