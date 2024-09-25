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

<div id="login">
<h2 align="center">Register ext</h2>
<table border="0" align="center">

<form action="addFireExtinguisher.php" method="POST">
<tr><td>
FID<br>
<td/>
<input type="text" name="fid" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Name<br>
<td/>
<input type="text" name="name" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Expiry Date<br>
<td/>
<input type="date" name="date" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Status<br>
<td/>
<select name="status" class="form-control"> 
<option>Valid</option>
<option>Invalid</option><br>

</td></tr>

<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="Save"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['submit1'])){
//fields for department
$fid=$_REQUEST['fid'];
$name=$_REQUEST['name'];
$expiry=$_REQUEST['date'];
$status=$_REQUEST['status'];

include 'connect.php';
$querry="INSERT INTO `extinguishers`(`fid`, `name`, `expiry_date`, `status`)
                             VALUES ('$fid','$name','$expiry','$status')";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else
echo "Querry run successifully";
}

?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>