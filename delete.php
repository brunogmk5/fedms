<?php
session_start();
if(!isset($_SESSION['company_id'])){
include 'connect.php';
if(isset($_GET['fidd'])){
$fid=$_GET['fidd'];
$querryd="DELETE FROM `distribution` WHERE `fid`='$fid'";	
$resultd=$conn->query($querryd);	
if(!$resultd){
echo "please try another pin";
echo mysqli_error($conn);
}else{
	echo"thank u";
	header("location:distribution.php");
}
   }
}  
else{
header( 'Location:index.php' ) ;
}
?>

