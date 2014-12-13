<?php
$name=$_POST['username'];
$old=$_POST['oldpwd'];
$new=$_POST['newpwd'];
$con = $_POST['conpwd'];

$link=include('../conn.php');

if($link){
	$q = "select* from User where username = '$name';";
	
	$sql = mysqli_query($link, $q);
	$result = mysqli_fetch_object($sql);
	
	if($result == false)
		echo '<script>url="../default.html";window.location.href=url;alert("username not found!");</script>';
	else if($result->password != $old){
		echo '<script>url="../default.html";window.location.href=url;alert("wrong password!");</script>';
	}else if($new != $con)
		echo '<script>url="../default.html";window.location.href=url;alert("failed to change! please confirm your new password!");</script>';
	else{
		$query="update User set password='$new' where username='$name';";
		mysqli_query($link, $query);
		
		echo '<script>url="../default.html";window.location.href=url;alert("change successfully! login with your new password!");</script>';
	}
}
?>
