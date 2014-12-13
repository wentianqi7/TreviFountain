<?
$search_title=($_POST['search_title']!='')?($_POST['search_title']):'%';
$search_nick=($_POST['search_nick']!='')?($_POST['search_nick']):'%';
$search_status=($_POST['search_status']!='')?($_POST['search_status']):'%';

$s_date=($_POST['start_date']!='')?$_POST['start_date']:'%';
$s_month=($_POST['start_month']!='')?$_POST['start_month']:'%';
$s_year=($_POST['start_year']!='')?$_POST['start_year']:'%';
$start=date("$s_year-$s_month-$s_date");

$e_date=($_POST['end_date']!='')?$_POST['end_date']:'31';
$e_month=($_POST['end_month']!='')?$_POST['end_month']:'12';
$e_year=($_POST['end_year']!='')?$_POST['end_year']:'9999';
$end=date("$e_year-$e_month-$e_date");

$con=include('../conn.php');
?>

<?include('../account/isLog.php');$a_title=include('achievements/write_achievements.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trevi Fountain Posts</title>													
<link rel="stylesheet" type="text/css" href="wish_style.css"> 
<script type="text/javascript" src="hidden_div.js"></script>
<script src="../js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script> 
<script type="text/javascript" src="../js/jquery.scrollTo-min.js"></script> 
<script type="text/javascript" src="../js/jquery.localscroll-min.js"></script> 
<script type="text/javascript" src="../js/init.js"></script> 

<script type="text/javascript" language="javascript">
$(document).ready(function() {

      $("#searchwish").click(function(){
         $("#search_table").fadeIn('slow');
      });
});
</script>
</head>

<body>
<div id="page">
	<div id="header"> 
        	<div id="HL">           	
                	<div class="clearfix_1">&nbsp;</div>	
                	<div id="logo">&nbsp;</div>
		</div>
            
		<div id="HR">
                <div class="top_menu"></div>
                <div class="search_box">
			<form method="post" action="search_nick.php" name="search" id="search_form" onsubmit="">
			<div class="search_field_cont">
				<input type="text" id="nickname" name="nickname" class="search_field" value="" />
			</div>
			<input type="submit"  class="search_btn" value="" />
			</form>
		</div>
        	</div>
        </div>	 		        
 	<?php
 	$host=$_SESSION['username'];
 	$q=mysqli_query($con, "select nickname from User where username='$host'");
	$r=mysqli_fetch_array($q);
	$host_nick=$r['nickname'];
 	?>
				
	<ul id="menu_2">
        <li class="white"><a href="wish.php">Most Recent</a></li>
        <li class="green"><a href="wish_boys.php">Boys</a></li>
        <li class="blue"><a href="wish_girls.php">Girls</a></li>
        <li class="orange"><a href="wish_connections.php">Connections</a></li>
        <li class="light_blue"><a href='createHomepage.php'><? echo $host_nick;?></a></li>
        </ul>	
        <div id="cont_bg">			
            	<div id="content_main">
            		<div class="CL"> 
            		<br><br> 
			<?
	$sql="select* from Wish_List where title like '$search_title' AND nickname like '$search_nick' AND status like '$search_status' AND date >= '$start' AND date <= '$end'";
	
	$result=mysqli_query($con, $sql);
	
	$check=mysqli_num_rows($result);
	$index=0;
	
	if($check){
		while($row=mysqli_fetch_array($result)){
		$wish_id=$row['wish_id'];
		$name=$row['username'];
		$title=$row['title'];
		$nick=$row['nickname'];
		$posttime=date("Y-m-d", strtotime($row['date']));
		$deadline=date("Y-m-d", strtotime($row['deadline']));
		$status=$row['status'];
		$content=$row['content'];
		$index++;
		
		$title0=str_replace("'","\'",$title);
		$tempTitle=str_replace('"',"\'",$title0);
		$content0=str_replace("'","\'",$content);
		$tempContent=str_replace('"',"\'",$content0);
		?>
			<br><br>
			<?php
				$sql_pic="select* from ProfileImage where status='on' AND username='$name';";
				$result_pic=mysqli_query($con, $sql_pic);
				$check_pic=mysqli_num_rows($result_pic);
				if($check_pic){
					$row_pic=mysqli_fetch_array($result);
					$image0=$row_pic['image'];
					$image=substr($image0, 1);
					echo '<img src =homepages'.$image.' width="130" height="130" class="alignleft border"/>';
				}else echo '<img src = "images/default_profile_image.png" width="130" height="130" class="alignleft border"/>';
			?>
			<br>
			Wish Title: &nbsp
			<?echo '<a href="javascript:showDiv(\''.$tempTitle.'\',\''.$tempContent.'\',\''.$id.'\',\''.$canEdit.'\');">'.$title.'</a>';?><br>
			Posted By: &nbsp
			<?
				$url="homepages/".$name.".php";
				if(file_exists($url)){echo '<a href="'.$url.'">'.$nick.'</a>';}
				else{echo $nick;}
			?>
			<br>
			Release Time:&nbsp<?echo $posttime;?>&nbsp; Exprire By:&nbsp<?echo $deadline;?>&nbsp; Status:&nbsp<?echo $status;?>
		<?
		}
	}else{
		?><script>alert('No Wish Matches~! Please modify your filter :)');
			window.location.href = 'wish.php';
		</script><?
	}
?>
	
                <div class="page_number">
                <ul> 
                <?php 
		$sql = "select* from Wish_List where title like '$search_title' AND nickname like '$search_nick' AND status like '$search_status' AND date >= '$start' AND date <= '$end'"; 
		$rs_result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_row($rs_result); 
		$total_records = $row[0]; 
		$total_pages = ceil($total_records / 5); 
  
		for ($i=1; $i<=$total_pages; $i++) {
		?> 
       		     <li><?echo "<a href='wish.php?page=".$i."'>".$i."</a> ";?></li> 
		<?php
		} 
		?>
                </ul>
                </div>

                </div>
		
		
			<div class="CR">
			<br><br>
				<div class="logout"><a href='../home.html'>Log Out</a></div>
				<div class="postwish"; onclick="ShowModalWindow()">
				&nbsp; Make Your Wish Here!<br>
				</div>

				<div id="searchwish"; class="searchwish">
				&nbsp; Search Wishes!<br>
				</div> 
		
				<div class="search_form"; id="search_table">
			<br>
			<form name="search_wish" method="post" action="search.php" onsubmit="">
			Title: <input id="search_title" name="search_title" /><br>
			Nickname: <input id="search_nick" name="search_nick"><br>
			Status: <select id="search_status" name="search_status">
			<option></option>
			<option value="new">new</option>
			<option value="taken">taken</option>
			<option value="dead">dead</option>
			<option value="resolved">resolved</option>
			</select><br>
			Date (dd/mm/yyyy)<br>From<select id="start_date" name="start_date">
			<option></option>
			<script>
				for(var i=0;i<31;i++){document.write('<option value="'+(i+1)+'">'+					(i+1)+'</option>');}
			</script>
			</select>
			<select id="start_month" name="start_month">
			<option></option>
			<script>
				for(var i=0;i<12;i++){document.write('<option value="'+(i+1)+'">'+(i+1)+'</option>');}
			</script>
			</select>
			<input id="start_year" name="start_year" size=6 /><br>
			To<select id="end_date" name="end_date">
			<option></option>
			<script>
				for(var i=0;i<31;i++){document.write('<option value="'+(i+1)+'">'+(i+1)+'</option>');}	
			</script>
			</select>
			<select id="end_month" name="end_month">
			<option></option>
			<script>
				for(var i=0;i<12;i++){document.write('<option value="'+(i+1)+'">'+(i+1)+'</option>');}
			</script>
			</select>
			<input id="end_year" name="end_year" size=6 /><br>
			<input type="submit" value="Search"/>
			&nbsp<input type="button" value="Cancel" onclick="CloseSearch();"/><br>
			</form>
				</div>
			</div>
		</div>
	</div>
        		              
        <div id="footer_wrapper">
        </div>
</div>
</body>
</html>
