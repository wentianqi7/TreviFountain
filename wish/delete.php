<?php
$con=include('../conn.php');
$wish_id=$_POST['delete_id'];

$sql="delete from Wish_List where wish_id='$wish_id'";
$sql2="delete from Make where wish_id='$wish_id'";
$sql3="delete from Take where wish_id='$wish_id'";
mysqli_query($con, $sql);
mysqli_query($con, $sql2);
mysqli_query($con, $sql3);
//echo $wish_id;
echo '<script>window.location.href="wish.php"</script>';
?>
