<?php
$kw=$_POST['nickname'];
echo $kw;
$link=include('../conn.php');

if($link){
$q="select nickname from User where nickname like '%$kw%'";
$result=mysqli_query($link, $q);

echo 'search result - nickname:<br/>';
while($row=mysqli_fetch_array($result)){
	echo $row['nickname'].'<br/>';
}
echo '<a href="wish.php">back to the home page</a>';

}
?>
