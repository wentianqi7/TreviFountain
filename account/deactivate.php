<?php
$con = include('../conn.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_query($con,"DELETE FROM User WHERE username='{$_POST['username']}'");

echo '<script>url="../default.html";window.location.href=url;alert("successfully deactived!");</script>';

?>
