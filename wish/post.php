<?php
session_start();

$tempTitle=$_POST['wish_title'];

$tempContent=$_POST['wish_content'];

$name=$_SESSION['username'];

$postdate=date("Y-m-d H:i:s");

$d_date=$_POST['date'];

$d_month=$_POST['month'];

$d_year=$_POST['year'];

$deadline=date("$d_year-$d_month-$d_date");

$status='new';


$title0=str_replace("'","\'",$tempTitle);

$title=str_replace('"','\"',$title0);

$content0=str_replace("'","\'",$tempContent);

$content=str_replace('"','\"',$content0);


if(isset($title)){
	
$link=include('../conn.php');

	if($link){
		
$getNK = mysqli_query($link, "select nickname from User where username = '$name';");
		
$row = mysqli_fetch_array($getNK);
		
$nick=$row['nickname'];
		

$q1 = "select max(wish_id) as large from Wish_List";


		$sql = mysqli_query($link, $q1);
		
$row2=mysqli_fetch_array($sql);
		
$wish_id=$row2['large'];

		$wish_id++;

		$q2 = "insert into Wish_List values('$wish_id', '$nick', '$title','$content',
'$postdate', '$deadline', '$status')";
			mysqli_query($link, $q2);

		$q3 = "insert into Make values('$name', '$wish_id')";
		
mysqli_query($link, $q3);

		$q4 = "insert into Updating values('$wish_id','$name',0);";
		
mysqli_query($link, $q4);

		echo '<script>alert("successfully posted!");
		self.opener.location.reload();window.opener=null;
		window.close();</script>';
	
}

}
?>
