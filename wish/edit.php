<?php
$con=include('../conn.php');

$wish_id=$_POST['edit_id'];
$title=$_POST['edit_title'];
$content=$_POST['edit_content'];

$sql="update Wish_List set title='$title',content='$content' where wish_id='$wish_id'";
mysqli_query($con,$sql);
echo '<script>window.location.href="wish.php"</script>';
?>
