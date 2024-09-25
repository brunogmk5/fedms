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
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">Register dist</h2>
<table border="0" align="center">

<form action="distribute.php" method="POST">
<tr><td>
Extinguisher fid<br>
<td/>
<input type="text" name="fid" required="required" class="form-control"><br>
</td></tr>
<tr><td>
company id<br>
<td/>
<input type="text" name="company_id" required="required" class="form-control"><br>
</td></tr>

<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="Save"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
include 'connect.php';
if(isset($_REQUEST['submit1'])){
//fields for department

$fid=$_REQUEST['fid'];
$company_id=$_REQUEST['company_id'];


$querry="INSERT INTO `distribution`( `fid`, `company_id`, `status`) 
                            VALUES ('$fid','$company_id','PENDING')";
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