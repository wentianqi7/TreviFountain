<?
include('../../account/isLog.php');
$con=include('/home/trevifountain/public_html/conn.php');
$list=array();
$list=include('recommend.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1-4-2.min.js"></script> 
<script type="text/javascript" src="js/cloud-carousel.1.0.5.js"></script>
<script type="text/javascript" src="js/showUpload.js"></script>
<script type="text/javascript" src="js/control.js"></script>
<script type="text/javascript" src="js/gallery.js"></script>

</head>

<?
$host=$_SESSION['username'];
?>

<body onload="isFollow(<?echo $isFollow;?>); canFollow(<?echo $isself;?>);" style="background-color:#FFA631">
	<div id="bg">
		<div id="outer">
			<div id="header">
				<div id="p-bg"></div>
				<div id="profile-img" onmouseover="displayDiv('ul_img',true)" onmouseout="displayDiv('ul_img',false)">
				<a href="#">
				<?
				$sql="select* from ProfileImage where status='on' AND username='$host';";
				$result=mysqli_query($con, $sql);
				$check=mysqli_num_rows($result);
				if($check){
					$row=mysqli_fetch_array($result);
					$image=$row['image'];
					echo '<img src ='.$image.' align="middle" style="width:200px"/>';
				}else echo '<img src = "images/default.jpg" align="middle" style="width:200px"/>';
				?>
				</a>
				</div>
				
				<div id="ul_img" onmouseover="displayDiv('ul_img',true)" onmouseout="displayDiv('ul_img',false)">
				<?if($isself){
					echo '<form method="post" action="upload.php" enctype="multipart/form-data"><input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>File： <br/><input name="file" type="file" /><br/><input type="submit" name="submit" value="Upload" /></form>';
				}
				?>
			    	</div>
			    	<div id="nickname" style="margin-left:270px">
			    	<h2 style="display:inline">View Your Coonections Here! ^^</h2>
			    	</div>
			</div>
			
			
			<div id="banner" style="background: #0b1a20; margin-top: 20px">
				<img src="images/pic12.jpg" width="1120" height="200" alt="" />
			</div>
			
			<div id="main">
				<div id="sidebar">
					<h2>
						Friends List
					</h2>
					
					<ul class="linkedList">
						<li class="first active">
							<a href="javascript: showDiv(2);">Friends</a>
						</li>
						<li class="deactive">
							<a href="javascript: showDiv(4);">Following</a>
						</li>
						<li class="active">
							<a href="javascript: showDiv(3);">Followers</a>
						</li>
						<li class="deactive">
						<?	echo'<a href="../createHomepage.php">'?>Profile</a>
						</li>
						<li class="active">
							<a href="../wish.php">Trevi Fountain</a>
						</li>
						<li class="last deactive">
							<a href="../../account/login.php?action=logout">Log Out</a>
						</li>
					</ul>
				</div>
				<div id="content">
					<div id="box4">
					<h1>
						Following
					</h1>
					
					<p><h3><?
					$sql6=mysqli_query($con, "select* from Friends where follower='$host';");
					$check6=mysqli_num_rows($sql6);
					$index2=0;
					if($check6){
						while($result6=mysqli_fetch_array($sql6)){
						$followee=$result6['followee'];
						$sql7=mysqli_query($con, "select* from ProfileImage where username='$followee' and status='on'");
						$check7=mysqli_num_rows($sql7);
						?><div style="display:inline; margin-left:20px;"><?
						
						if($check7){
							$result7=mysqli_fetch_array($sql7);
							$image7=$result7['image'];
							echo '<img src ='.$image7.' width="180px"/>';
						}else echo '<img src = "../images/default_profile_image.png" width="180px"/>';
						?></div><?
						}	
					}else{
						echo '<h4>There are someone that you may know...</h4>';
					}	
					?></h3></p>
					</div>
					
					<div id="box3">
					<h1>
						Follwers
					</h1>
					<p><h3><?
					$sql6=mysqli_query($con, "select* from Friends where followee='$host';");
					$check6=mysqli_num_rows($sql6);
					//$index3=0;
					if($check6){
						while($result6=mysqli_fetch_array($sql6)){
						$follower=$result6['follower'];
						
						$sql7=mysqli_query($con, "select* from ProfileImage where username='$follower' and status='on'");
						$check7=mysqli_num_rows($sql7);
						
						?><div style="display:inline; margin-left:20px;"><?
						
						if($check7){
							$result7=mysqli_fetch_array($sql7);
							$image7=$result7['image'];
							echo '<img src ='.$image7.' width="180px"/>';
						}else echo '<img src = "../images/default_profile_image.png" width="180px"/>';
						?></div><?
						
						}
					}else{
						echo '<h4>There are someone that you may know...</h4>';
					}	
					?></h3></p>
					</div>
					
					<div id="box2">
					<h1>
						Friends
					</h1>
					<p><h3><?
					$sql6=mysqli_query($con, "select f1.follower as follower,f1.followee as followee from Friends f1,Friends f2 where f1.followee=f2.follower AND f1.follower=f2.followee AND f1.follower = '$host';");
					$check6=mysqli_num_rows($sql6);
					//$index3=0;
					if($check6){
						while($result6=mysqli_fetch_array($sql6)){
						$followee=$result6['followee'];
						
						$sql7=mysqli_query($con, "select* from ProfileImage where username='$followee' and status='on';");
						$check7=mysqli_num_rows($sql7);
						
						?><div style="display:inline; margin-left:20px;"><?
						
						if($check7){
							$result7=mysqli_fetch_array($sql7);
							$image7=$result7['image'];
							echo '<a href="'.$followee.'.php"><img src ='.$image7.' width="180px"/></a>';
						}else echo '<a href=".$followee.".php><img src = "../images/default_profile_image.png" width="180px"/></a>';
						?></div><?
						
						}
					}
					
					echo '<h4>There are someone that you may know...</h4>';
					//recommendation
					if($list){
						$limit=sizeof($list);
						for($index=0;$index<$limit;$index++){
							$r_user=$list[$index];
							$sql7=mysqli_query($con, "select* from ProfileImage where username='$r_user' and status='on';");
							$check7=mysqli_num_rows($sql7);
							$id="r_img".$index;
							?>
							<div onmouseover="displayDiv('<?echo $id?>',true)" onmouseout="displayDiv('<?echo $id?>',false)" style="display:inline; margin-left:20px;">
							<div onmouseover="displayDiv('<?echo $id?>',true)" onmouseout="displayDiv('<?echo $id?>',false)" class="r_img" id="<?echo $id?>">
							<h3><?echo $r_user;?></h3>
							</div>
							<?
								
							if($check7){
								$result7=mysqli_fetch_array($sql7);
								$image7=$result7['image'];
								echo '<a href="'.$r_user.'.php"><img src ='.$image7.' width="180px"/></a>';
							}else echo '<a href="'.$r_user.'.php"><img src = "../images/default_profile_image.png" width="180px"/></a>';
							?></div><?
							
						}
					}
					//end recommendation	
					?></h3></p>
					</div>
					<div id="box5"></div><div id="box6"></div><div id="box7"></div>
				</div>
			</div>
		</div>
	</div>
</body>
