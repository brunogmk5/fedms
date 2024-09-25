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
<h2 align="center">update distr</h2>
<table border="0" align="center">

<form action="updatedistribution.php" method="POST">
<tr><td>
id<br>
<td/>
<input type="text" name="id" required="required" class="form-control" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>"><br>
</td></tr>
<tr><td>
extinguisher fid<br>
<td/>
<input type="text" name="fid" required="required" class="form-control" value="<?php if(isset($_GET['fid'])){echo $_GET['fid'];}?>"><br>
</td></tr>
<tr><td>
company_id<br>
<td/>
<input type="text" name="company_id" required="required" class="form-control" value="<?php if(isset($_GET['company_id'])){echo $_GET['company_id'];}?>"><br>
</td></tr>

<tr><td>
date<br>
<td/>
<input type="date" name="date" required="required" class="form-control"value="<?php if(isset($_GET['date'])){echo $_GET['date'];}?>"><br>
</td></tr>

<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="update"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
include 'connect.php';
if(isset($_GET['idd'])){
  $id=$_GET['idd'];
$querry="delete from distribution WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:distribution.php' ) ;
}
if(isset($_REQUEST['submit1'])){
//fields for department
$id=$_REQUEST['id'];
$fid=$_REQUEST['fid'];
$company_id=$_REQUEST['company_id'];
$date=$_REQUEST['date'];
$querry="UPDATE `distribution` SET `id`='$id',`fid`='$fid',`company_id`='$company_id',`date`='$date' WHERE id='$id'";
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