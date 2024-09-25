<?php
//echo getRemainingTime(1234);
$diff=0;
function getRemainingTime($fid,$conn){
	$diff=0;
    $querry="SELECT DATEDIFF(`expiry_date`,NOW()) as diff, `status` FROM `extinguishers` WHERE fid='$fid'";
    $result=$conn->query($querry);
    if($result){
     while($query_row=$result->fetch_assoc() ){
      $diff=$query_row['diff'];

  }
  return $diff;
}
 mysqli_close($conn);
}
?>