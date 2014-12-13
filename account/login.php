<?php
session_start();

if($_GET['action'] == "logout"){
    //unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '<script>url="../home.html";window.location.href=url;alert("successfully log out!");</script>';
    
}else if(isset($_POST['username'])&&isset($_POST['password'])){
	$name = $_POST['username'];
	$pwd = $_POST['password'];
	$con = include('../conn.php');
	if($con){
		//echo 'yes<br/>';
		$q = "select* from User where username = '$name';";
		//echo $q.'<br/>';
		$sql = mysqli_query($con, $q);
		$result = mysqli_fetch_object($sql);
		
		if($result == false)
			echo '<script>url="../home.html";window.location.href=url;alert("username not found! please log in again!");</script>';
		else if($result->password == $pwd){
			session_start();
			$_SESSION['username'] = $name;
			echo '<script>url="../wish/wish.php";window.location.href=url;</script>';
		}else
			echo '<script>url="../home.html";window.location.href=url;alert("wrong password! please log in again!");</script>';
		
	}else
		echo 'connection failed!';
}
?>
