<?php
include 'connect.php';

if(isset($_GET['fida'])){
$fida=$_GET['fida'];
$querry="UPDATE `distribution` SET `status`='APPROVED' WHERE fid='$fida'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
header( 'Location:distribution.php' ) ;
}
?>