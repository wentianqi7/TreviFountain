<?include('../account/isLog.php');$link=include('../conn.php');$a_title=include('achievements/write_achievements.php');?>
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
			<form method="post" action="search_user.php" name="search" id="search_form" onsubmit="">
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
 	?>
				
	<ul id="menu_2">
        <li class="white"><a href="wish.php">Most Recent</a></li>
        <li class="green"><a href="wish_boys.php">Boys</a></li>
        <li class="blue"><a href="wish_girls.php">Girls</a></li>
        <li class="orange"><a href="wish_connections.php">Connections</a></li>
        <li class="light_blue"><a href="profile.php"><? echo $host;?></a></li>
        </ul>	
        
        <div id="cont_bg">			
            	<div id="content_main">
            		<div class="CL"> 
            		<br><br> 
			<?php
			$kw=$_POST['nickname'];
			$link=include('../conn.php');

			if($link){
			$q="select nickname from User where nickname like '%$kw%'";
			$result=mysqli_query($link, $q);


			echo 'Search Result:<br/>';
			while($row=mysqli_fetch_array($result)){
			echo $row['nickname'].'<br/>';
			}
			echo '<a href="wish.php">back to the home page</a>';
			}
			?>
			
                </div>
		
		
			<div class="CR">
			<br><br>
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
