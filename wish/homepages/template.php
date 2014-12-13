<?include('../../account/isLog.php');$con=include('/home/trevifountain/public_html/conn.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1-4-2.min.js"></script> 
<script type="text/javascript" src="js/cloud-carousel.1.0.5.js"></script>
<script type="text/javascript" src="js/showUpload.js"></script>
<script type="text/javascript" src="js/control.js"></script>
<script type="text/javascript" src="js/gallery.js"></script>

</head>

<?
$name=$_SESSION['username'];
$url = $_SERVER['PHP_SELF'];
$arr = explode( '/' , $url );
$filename= $arr[count($arr)-1];
$host = substr($filename, 0, -4);
$isself=($host==$name)?true:false;
//obtain one's nickname
$sql0=mysqli_query($con, "select nickname from User where username='$name'");
$sql1=mysqli_query($con, "select nickname from User where username='$host'");
$result0=mysqli_fetch_array($sql0);
$result1=mysqli_fetch_array($sql1);
$visitor_nick=$result0['nickname'];
$host_nick=$result1['nickname'];
$host_nick_call=($host==$name)?'Your':$host_nick.'\'s';

$sql5=mysqli_query($con, "select* from Friends where followee='$host' AND follower='$name'");
$check5=mysqli_num_rows($sql5);
$isFollow=($check5)?true:false;
?>

<body onload="isFollow(<?echo $isFollow;?>); canFollow(<?echo $isself;?>);">
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
			<h1 style="display:inline">Hi, <?echo $visitor_nick;?>~! Welcome to <?echo $host_nick_call;?> Profile...</h1>
			<form id="follow" name="follow" method="post" action="follow.php" style="display:none; margin-left: 20px">
			<input id="is_follow" name="is_follow" style="display:none"/>
			<input id="f_file" name="f_file" value=<?echo $filename?> style="display:none"/>
			<input id="f_host" name="f_host" value=<?echo $host?> style="display:none"/>
			<input id="fSubmit" type="submit" class="fbutton" value=""/>
			</form>
			</div>
			<br/><br/>
			</div>
			
			<div id="banner" style="background: #0b1a20">
				<img src="images/pic12.jpg" width="1120" height="200" alt="" />
			</div>
			<div id="main">
				<div id="sidebar">
					<h2 stype="">
						Profile
					</h2>
					
					<ul class="linkedList">
						<li class="first active">
							<a href="../wish.php">Trevi Fountain</a>
						</li>
						<li class="deactive">
							<a href="javascript: showDiv(5);">Following</a>
						</li>
						<li class="active">
							<a href="javascript: showDiv(6);">Followers</a>
						</li>
						<li class="deactive"> 
							<a href="javascript: showDiv(4);">Achievements</a>
						</li>
						<li class="active">
							<a href="javascript: showDiv(2);">Gallery</a>
						</li>
						<li class="last deactive">
							<a href="javascript: showDiv(3);">About</a>
						</li>
						<li class="active">
							<a href="../../account/login.php?action=logout">Log Out</a>
						</li>
					</ul>
				</div>
				<div id="content">
					<!--
					<div id="box1">
						<h2>
							Welcome to the Profile Page
						</h2>
						<center><img src = "images/coming.jpeg" align="middle" style="width:500px"/>
						<h2><a href="../wish.php">back</a> to wish list</h2></center>	
						
					</div>
					-->
					<div id="box2">
						<!--				gallery area				-->
						<h1>
							Gallery
						</h1>
						<div><ul/></div>

						<div id="templatemo_slider">
						<div id = "carousel1" style="width:960px; height:400px;background:none;overflow:scroll; margin-top: 30px; margin-left: -40px">
						<?php
						$sql2=mysqli_query($con, "select* from ProfileImage where username='$host'");
						$check2=mysqli_num_rows($sql2);
						$index=0;
						if($check2){
							while($result2=mysqli_fetch_array($sql2)){
							//$image_owner=$result2['username'];
							$image_dir=$result2['image'];
							$image_status=$result2['status'];
							$index++;
							echo '<img class="cloudcarousel" src='.$image_dir.' alt="gallery photo '.$index.'" style="width:200px"/>';
							//echo '<img class="cloudcarousel" src="./twen3/P-GODAwwYmV1.jpg" alt=$index/>';
							}
						}else{
							for($index=0;$index<8;$index++){
							echo '<img class="cloudcarousel" src="images/default/0'.$index.'.jpg" alt="gallery photo '.($index+1).'"/>';
							}
						}
						?>
						
						</div>
						       
						<center>
						<input id="slider-left-but" type="button" value="<<" />
						<input id="slider-right-but" type="button" value=">>" /><br class="clear"/><br class="clear"/>
						<form method="post" action="upload.php" enctype="multipart/form-data">
						<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
						<input name="file" class="inputbar" type="file" /><br class="clear"/><br class="clear"/>
						<input type="submit" name="submit" class="inputbar probutton" value="Upload" />
						</form>
						</center>
						</div>
						<!--                  gallery area end 				-->
						
					</div>
					
					<div id="box3">
						<?
						$sql3=mysqli_query($con, "select* from Profile where username='$host'");
						$check3=mysqli_num_rows($sql3);
						
						if($check3){
							while($result3=mysqli_fetch_array($sql3)){
							
							$age=($result3['age']==0)?'TBA':$result3['age'];
							$gender=($result3['gender']=='')?'TBA':$result3['gender'];
							$about_u=($result3['about_u']=='')?'TBA':$result3['about_u'];
							$email=($result3['email']=='')?'TBA':$result3['email'];
							
							}
						}else{
							$age=$gender=$about_u=$email='TBA';
						}
						?>
						<h1>
							About
						</h1>
						<p>
						<h3>Nickname:  <input type="text" id="nick" class="inputnick" value="<?echo $host_nick;?>" readonly /><h3>
						<h3>Age:  <input type="text" id="age" class="inputbar" onchange="update();" value="<?echo $age;?>" readonly /><h3>
						<h3>Gender:  <input type="text" id="gender" class="inputbar" onchange="update();" value="<?echo $gender;?>" readonly /><h3>
						<h3>About You:  <input type="text" id="au" class="inputbar" onchange="update();" value="<?echo $about_u;?>" readonly /><h3>
						<h3>E-Mail:  <input type="email" id="em" class="inputbar" onchange="update();" value="<?echo $email;?>" readonly /><h3>
						</p>
						<?
						if($isself){
							echo '<div id="edit">';
						}else{
							echo '<div id="edit" style="display:none">';
						}
						?>
						<input type="button" class="probutton" onclick="javascript: enableEdit(); " value="Edit"/>
						</div>
						<div id="d_edit" style="display:none">
						<form name="edit" method="post" action="edit_profile.php" style="display:inline" onsubmit="">
						<input id="e_age" name="e_age" style="display:none"/>
						<input id="e_gender" name="e_gender" style="display:none"/>
						<input id="e_about" name="e_about" style="display:none"/>
						<input id="e_email" name="e_email" style="display:none"/>
						<input id="e_file" name="e_file" value=<?echo $filename?> style="display:none"/>
						<input type="submit" class="probutton" value="Confirm"/>
						</form>
						<input type="button" class="probutton" onclick="<?echo 'cancelEdit(\''.$age.'\',\''.$gender.'\',\''.$about_u.'\',\''.$email.'\');';?>" value="Cancel"/>
						
						</div>
					</div>
					
					<div id="box4">
						<h1>
							Achievements
						</h1><br class="clear"/>
						<p><h3><?
						$sql6=mysqli_query($con, "select* from Achievement where username='$host';");
						$check6=mysqli_num_rows($sql6);
						
						if($check6){
							while($result6=mysqli_fetch_array($sql6)){
							$title=$result6['title'];
							$content=$result6['description'];
							$time=$result6['date'];
							
							if($title!=''){
							?>
							<img src ="images/achieve.jpg" width="140px" style="display:inline"/>
							<div id="content2">
							<?echo $title;?><br/>
							<?echo $content;?>
							</div>
							<br class="clear"/>
							<?
							}
							
							}	
						}else{
							echo 'You Haven\'t Made Any Achievement Yet....Try Post & Take Some Wishes!';
						}	
						?></h3></p>
					</div>
					
					<div id="box5">
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
							$sql7=mysqli_query($con, "select* from ProfileImage where username='$followee'");
							$check7=mysqli_num_rows($sql7);
							?><div style="display:inline; margin-left:20px;"><?
							
							if($check7){
								$result7=mysqli_fetch_array($sql7);
								$image7=$result7['image'];
								echo '<a href="'.$followee.'.php"><img src ='.$image7.' width="180px"/></a>';
							}else echo '<img src = "../images/default_profile_image.png" width="180px"/>';
							?></div><?
							}	
						}else{
							echo 'You Haven\'t Follow Anybody Yet....Try Post Some Wishes!';
						}	
						?></h3></p>
					</div>
					
					<div id="box6">
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
							
							$sql7=mysqli_query($con, "select* from ProfileImage where username='$follower'");
							$check7=mysqli_num_rows($sql7);
							
							?><div style="display:inline; margin-left:20px;"><?
							
							if($check7){
								$result7=mysqli_fetch_array($sql7);
								$image7=$result7['image'];
								echo '<a href="'.$follower.'.php"><img src ='.$image7.' width="180px"/></a>';
							}else echo '<img src = "../images/default_profile_image.png" width="180px"/>';
							?></div><?
							
							}
						}else{
							echo 'You Haven\'t Got Any Follower Yet. Try Post Some Wishes!';
						}	
						?></h3></p>
					</div>
					
					<br class="clear" />
				</div>
				<br class="clear" />
			</div>
		</div>
</body>
</html>
