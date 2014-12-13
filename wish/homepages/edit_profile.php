<?php
session_start();
$con=include('../../conn.php');
$name=$_SESSION['username'];
$age=$_POST['e_age'];
$gender=$_POST['e_gender'];
$about=$_POST['e_about'];
$email=$_POST['e_email'];
$file=$_POST['e_file'];
$sql="update Profile set age='$age',gender='$gender',about_u='$about',email='$email' where username='$name'";
mysqli_query($con,$sql);

echo '<script>window.location.href="http://web.engr.illinois.edu/~trevifountain/wish/homepages/'.$file.'"</script>';
?>
