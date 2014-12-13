<?php
$con=include('/home/trevifountain/public_html/conn.php');
session_start();
$name=$_SESSION['username'];

$uploaddir = "./".$name."/"; 
$type=array("jpg","gif","bmp","jpeg","png");
  
//obtain the postfix of a file
function fileext($filename){
	return substr(strrchr($filename, '.'), 1);
}

//generate a random filename 
function random($length){
	$hash = 'P-';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars) - 1;
	mt_srand((double)microtime() * 1000000);
	
	for($i = 0; $i < $length; $i++){
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}


//end of functions

$a=strtolower(fileext($_FILES['file']['name']));

if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)){
	$text=implode(",",$type);
	echo "You can only upload file with the following format: ",$text,"<br>";
}else{
	$filename=explode(".",$_FILES['file']['name']);
	do{
		$filename[0]=random(10); //generate the length of random number
		$imagename=implode(".",$filename);
		
		$uploadfile=$uploaddir.$imagename;
	}while(file_exists($uploadfile));

	if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
		//preview
		$sql="insert into ProfileImage values('$name', '$uploadfile', 'off')";
		mysqli_query($con, $sql);
		echo "<center>Successfully Uploaded!</center><br><center><img src='$uploadfile'></center>";
		
		/*if ($_POST["action"] == 'runfunction'){
			$sql2 = "Update ProfileImage set status='off' where username='$name';";
			mysqli_query($con, $sql2);
			$sql3 = "Update ProfileImage set status='on' where username='$name' AND image='$uploadfile';";
			mysqli_query($con, $sql3);
		}*/
		
		echo '<br><center>';
		echo '<form name="setImage" method="post" action="setImage.php" onsubmit="">';
		echo '<input id="image" name="image" value="'.$uploadfile.'" type="hidden"/>';
		echo '<input id="username" name="username" value="'.$name.'" type="hidden"/>';
	    	echo '<input type="submit" value="Use As Profile"/></form>';
		echo '<button onclick="javascript:history.go(-1);">Back to your Homepage</button></center>';
		
		//echo "<button onclick='javascript:history.go(-1);'>Back to your Homepage</button></center>";
	}
}
?>
