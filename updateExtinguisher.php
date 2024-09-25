<?php
session_start();
//if($_SESSION['position']=='Admin'){
//}
//else{
//header( 'Location:index.php' ) ;
//}
?>
<?php
include 'menu.html';
?>
<body style="background-color:#cdeeff">

<div id="login">
<h2 align="center">update ext</h2>
<table border="0" align="center">

<form action="updateExtinguisher.php" method="POST">
<tr><td>
fid<br>
<td/>
<input type="text" name="fid" required="required" class="form-control" value="<?php if(isset($_GET['fidu'])){echo $_GET['fidu'];}?>"><br>
</td></tr>
<tr><td>
Name<br>
<td/>
<input type="text" name="name" required="required" class="form-control" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}?>"><br>
</td></tr>
<tr><td>
Expiry Date<br>
<td/>
<input type="date" name="expiry_date" required="required" class="form-control" ><br>
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
<input type="SUBMIT" name="submit1" value="send"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php

include 'connect.php';
if(isset($_GET['fidd'])){
  $fid=$_GET['fidd'];
$querry="delete from extinguishers WHERE fid='$fid'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:extinguishers.php' ) ;
}
if(isset($_REQUEST['submit1'])){
//fields for department
$fid=$_REQUEST['fid'];
$name=$_REQUEST['name'];
$expiry_date=$_REQUEST['expiry_date'];
$status=$_REQUEST['status'];

$querry="UPDATE `extinguishers` SET `name`='$name',`expiry_date`='$expiry_date',`status`='$status' WHERE fid='$fid'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else {
echo "Querry run successifully";
}
}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>