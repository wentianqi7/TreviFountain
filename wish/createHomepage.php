<?php
session_start();
$con=include('../conn.php');
require("../Smarty/libs/Smarty.class.php");
$name=$_SESSION['username'];
$link="homepages/".$name.".php";

if(!file_exists($link)){
	$sql="insert into Profile values ('$name',0,'','','')";
	mysqli_query($con, $sql);
	
	$fp=fopen($link,"w");
	$t=new Smarty;
	$t->assign("title","Hello!");
	$content=$t->fetch("homepages/template.php");
	
	mkdir("homepages/".$name, 0777);
	fwrite($fp, $content);
	fclose($fp);

	//echo $link.'<br>';
	echo '<script>alert("Create Successfully!");window.location.href="'.$link.'";</script>';
}else{
	echo '<script>window.location.href="'.$link.'"</script>';
}
?>
