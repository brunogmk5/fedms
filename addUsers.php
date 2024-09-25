<?php
session_start();
if($_SESSION['position']=='Admin'){
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
<h2 align="center">Register Staffs</h2>
<table border="0" align="center">

<form action="addUsers.php" method="POST">
<tr><td>
Username<br>
<td/>
<input type="text" name="username" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Firstname<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Lastname<br>
<td/>
<input type="text" name="lastname" required="required" class="form-control"><br>
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
<tr><td>
Position<br>
<td/>
<select name="position" class="form-control"> <option>Choose your Position</option><option>User</option><option>Admin</option></select ><br>
</td></tr>
<tr><td></td>
<td>
<input type="SUBMIT" name="submit1" value="Add User"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['submit1'])){
//fields for department
$username=$_REQUEST['username'];
$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$password=$_REQUEST['password1'];
$password2=$_REQUEST['password2'];
$position=$_REQUEST['position'];


include 'connect.php';;
if($password==$password2){
$querry="INSERT INTO `staff`( `firstname`, `lastname`, `username`,`position`,`password`)
                     VALUES ('$firstname','$lastname','$username','$position','$password')";
$result=$conn->query($querry);
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
</div>
<div id="footer">

</div>
</div>
</body>
</html>