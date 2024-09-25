<?php

session_start();
if($_SESSION['position']=='Admin'){
	
}
else{
header( 'Location:logout.php' ) ;
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
<a class="navbar-brand" href="allusers.php">Search</a>
</div>
<div>
<form action="allusers.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">List of staffs</h1> 
<?php
include'connect.php';
$querry="SELECT  `firstname`, `lastname`, `username`, `password`, `position` FROM `staff`";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `firstname`, `lastname`, `username`, `password`, `position` FROM `staff`
     WHERE firstname='$search'or lastname='$search'  or username='$search' or password='$search'or position='$search' ";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th>First Name</th><th>Last  Name</th><th>Username</th><th>Position</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$firstname=$query_row['firstname'];
$lastname=$query_row['lastname'];
$username=$query_row['username'];
$position=$query_row['position'];

echo '<tr>';
echo '<td>';
echo $firstname;
echo '</td>';
echo '<td>';
echo $lastname;
echo '</td>';
echo '<td>';
echo $username;
echo '</td>';
echo '<td>';
echo $position;
echo '</td>';
echo '<td>';
echo '<a href='."updateStaff.php?username=$username&firstname=$firstname&lastname=$lastname".'>'.'Update&nbsp'.'</a>';
echo '<a href='."updateStaff.php?used=$username".'>'.'&nbspRemove'.'</a><br>';
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