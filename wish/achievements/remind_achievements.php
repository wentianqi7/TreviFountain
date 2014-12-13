<?php
session_start();
$name=$_SESSION['username'];
$con=include('/home/trevifountain/public_html/conn.php');
$sql="select* from Achievement where username='$name' AND status='new';";
$result=mysqli_query($con, $sql);
$check=mysqli_num_rows($result);
if($check){
	
	$row=mysqli_fetch_array($result);
	$title=$row['title'];
	$descp=$row['description'];
	$aid=$row['aid'];
	
	$sql0="Update Achievement set status='old' where aid='$aid'";
	mysqli_query($con, $sql0);
	//echo "you've achive ".$title.", ".$name."!<br>";
	//echo '<script>alert("you\'ve achive '.$title.', '.$name.'!");window.location.href="http://web.engr.illinois.edu/~trevifountain/wish/wish.php";</script>';
	return $title;
}else{
	return false;
}
?>
