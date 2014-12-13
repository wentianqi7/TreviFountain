<?php
session_start();
$con=include('../conn.php');
$name=$_SESSION['username'];
$wish_id=$_POST['take_id'];
$take_date=date("Y-m-d H:i:s");
$q="select* from Take where username='$name' AND wish_id='$wish_id'";
$check=mysqli_query($con, $q);
$q2="select* from Make where username='$name' AND wish_id='$wish_id'";
$check2=mysqli_query($con, $q2);

if(!mysqli_fetch_object($check)){
	if(!mysqli_fetch_object($check2)){
	$sql = "insert into Take values('$name', '$wish_id', '$take_date')";
	mysqli_query($con, $sql);
	$sql2 = "update Wish_List set status='taken' where wish_id='$wish_id' AND status = 'new'";
	mysqli_query($con, $sql2);
	$sql3 = "insert into Updating values('$wish_id','$name',1);";
	mysqli_query($con, $sql3);
	echo '<script>alert("Take successfully!");url="wish.php";window.location.href=url;</script>';
	
	}else{
		echo '<script>alert("You cannot take your own wish!");url="wish.php";window.location.href=url;</script>';
	}
			
}else{
	echo '<script>alert("This wish has already been taken by you!");url="wish.php";window.location.href=url;</script>';
}

?>
