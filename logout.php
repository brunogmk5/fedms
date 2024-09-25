<?php
session_start();
if(isset($_SESSION['firstname'])){
unset($_SESSION['firstname']);
}
if(isset($_SESSION['password'])){
unset($_SESSION['password']);
}
if(isset($_SESSION['position'])){
unset($_SESSION['position']);
}
if(isset($_SESSION['company_id'])){
unset($_SESSION['company_id']);
}
   //  Must start a session before destroying it
header( 'Location:index.php' ) ;
?>