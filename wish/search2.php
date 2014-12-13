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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trevi Fountain Search Result Page</title>
	<link rel="stylesheet" href="wish_style.css" type="text/css" />
	<script type="text/javascript" src="hidden_div.js"></script>
</head>

<body>
<span style="text-align: center"><div align="top">
	<button id="top1" onclick="window.location.href='wish.php'">Trevi Fountain</button>
	<button id="top1" onclick="window.location.href='createHomepage.php'">Homepage</button>
	<button id="top1" onclick="alert('Coming soon!');">Achievments</button>
	<button id="top1" onclick="alert('Coming soon!');">Friends</button>
	<button id="top1" onclick="alert('Coming soon!');">Account</button>
	<button id="top1" onclick="window.location.href='../account/login.php?action=logout'">Log Out</button>
</div></span><br/>

<div style="text-align:center; width:300px;margin:auto">
	<h1 style="tefont-family: Arial;color:navy;text-align:center">Trevi Fountain</h1>
</div>

<div style="text-align:center">
<span id="wishtable" style="margin:auto">
<table align="center" style="text-align:center;width:61.8%" border = 1>
<tr><td style="width:8%">#</td><td style="width:18%">Title</td><td style="width:10%">Released By</td><td style="width:15%">Release Time</td><td style="width:15%">Expiry Date</td><td style="width:8%">Status</td></tr>
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
		<tr><td><?echo $index;?></td>
		<td><?echo '<a href="javascript:showDiv(\''.$tempTitle.'\',\''.$tempContent.'\',\''.$wish_id.'\');">'.$title.'</a>'?></td>
		<td><?
			$url="homepages/".$name.".php";
			if(file_exists($url)){echo '<a href="'.$url.'">'.$nick.'</a>';}
			else{echo $nick;}
		?></td>	
		<td><?echo $posttime;?></td>
		<td><?echo $deadline;?></td>
		<td><?echo $status;?></td></tr>
		<?
		}
	}else{
		?><script>alert('No Wish Matches~! Please modify your filter :)');</script><?
	}
?>
</table>
</span>
</div><p/><br>

<div style="text-align: center;">
<button id="top1" onclick="javascript:history.go(-1);">Back</button>
</div>

<div id="popDiv" class="mydiv" style="display:none;">
<div id="row1"><a href="javascript:closeDiv()" style="color: #FF6600">X</a>&nbsp;</div>
<h3><span id="wTitle"></span></h3>
<span id="wContent"></span>
<span id="wButton"></span>
</div>
<div id="bg" class="bg" style="display:none;"></div>
<iframe id='popIframe' class='popIframe' frameborder='0' ></iframe>

</body>
