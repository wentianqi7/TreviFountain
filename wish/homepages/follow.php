<?php
session_start();
$con=include('/home/trevifountain/public_html/conn.php');
$is_follow=$_POST['is_follow'];
$filename=$_POST['f_file'];
$name=$_SESSION['username'];
$host=$_POST['f_host'];

if($is_follow=='true'){
	$sql=mysqli_query($con, "delete from Friends where followee='$host' AND follower='$name';");
}else{
	$sql=mysqli_query($con, "insert into Friends values ('$host','$name');");
}
echo '<script>window.location.href="http://web.engr.illinois.edu/~trevifountain/wish/homepages/'.$filename.'"</script>';
?>
