<?php
$name=$_POST['username'];
$pwd=$_POST['password'];
$conpwd=$_POST['conpwd'];
$nick=$_POST['nickname'];

$con=include('../conn.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else if(isset($name)&&isset($pwd)&&isset($nick)){
	$q = "select* from User where username = '$name';";
	$sql1 = mysqli_query($con, $q);
	$user = mysqli_fetch_object($sql1);
	$p = "select* from User where nickname = '$nick';";
	$sql2 = mysqli_query($con, $p);
	$nk = mysqli_fetch_object($sql2);
	
	if($user == false && $nk == false){
		if($pwd==$conpwd){
			mysqli_query($con,"INSERT INTO User (username, password, nickname) VALUES ('{$name}', '{$pwd}','{$nick}')");
			echo '<script>url="../home.html";window.location.href=url;alert("register successfully!");</script>';
		}
		else
			echo '<script>url="../home.html";window.location.href=url;alert("please confirm your password!");</script>';
	}
	else if($user == false)
		echo '<script>url="../home.html";window.location.href=url;alert("nickname exists! please choose another one~ XD");</script>';
	else
		echo '<script>url="../home.html";window.location.href=url;alert("username exists! please choose another one~ =)");</script>';
}
mysqli_close($con);
?>
