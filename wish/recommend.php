<?php
session_start();
include('../../account/isLog.php');
$con=include('/home/trevifountain/public_html/conn.php');
$host=$_SESSION['username'];

/*$sql=" select username,COUNT(username) as number from 
((select Take.username as username from Take,(Wish_List natural join User) where Take.wish_id=Wish_List.wish_id AND User.username='twen3')Union all(select Make.username as username from Make,Take where Take.wish_id=Make.wish_id AND Take.username='twen3')Union all(select distinct f1.follower as username from Friends f1,Friends f2 where f1.followee<>f2.follower AND f1.follower=f2.followee and f1.followee='twen3')) as new group by username order by number desc";*/

/*select new.username,COUNT(new.username) as number from 
(((select Take.username as username from Take,(Wish_List natural join User) where Take.wish_id=Wish_List.wish_id AND User.username='twen3')Union all(select Make.username as username from Make,Take where Take.wish_id=Make.wish_id AND Take.username='twen3')) as new ,(select follower as username from Friends where followee='twen3' and  follower<>all(select followee from Friends where follower<>'twen3') )as new2) where new.username=new2.username group by username order by number desc*/
/*$sql=" select username,COUNT(username) as number from 
((select Take.username as username from Take,(Wish_List natural join User) where Take.wish_id=Wish_List.wish_id AND User.username='$host')Union all(select Make.username as username from Make,Take where Take.wish_id=Make.wish_id AND Take.username='$host')Union all(select follower as username from Friends where followee='$host' and  follower<>all(select followee from Friends where follower<>'$host'))) as new group by username order by number desc";*/

$total=12;

//interaction uni-follow
$sql="select new.username,COUNT(new.username) as number from 
(((select Take.username as username from Take,(Wish_List natural join User) where Take.wish_id=Wish_List.wish_id AND User.username='$host')Union all(select Make.username as username from Make,Take where Take.wish_id=Make.wish_id AND Take.username='$host')) as new ,(select follower as username from Friends where followee='$host' and  follower<>all(select followee from Friends where follower<>'$host') )as new2) where new.username=new2.username and new.username<>'' and new.username<>'$host' group by username order by number desc";

$result=mysqli_query($con, $sql);
$check=mysqli_num_rows($result);
$index=0;

$list=array();

if($check){
	$limit=$check;
	
	for($index=0;$index<$limit;$index++){
		$row=mysqli_fetch_array($result);
		$list[$index]=$row['username'];
	}
}

//var_dump($list);
//echo '<br>';		
 
//interaction unfollow
$sql1="select new.username as username,COUNT(new.username) as number from 
(((select Take.username as username from Take,(Wish_List natural join User) where Take.wish_id=Wish_List.wish_id AND User.username='$host')Union all(select Make.username as username from Make,Take where Take.wish_id=Make.wish_id AND Take.username='$host')) as new ,(select username from Profile where username<>'$host' and username<>'' and username<>all(select followee from Friends where follower='$host'))as new2) where new.username=new2.username group by username order by number desc";
$result1=mysqli_query($con, $sql1);
$check1=mysqli_num_rows($result1);

if($check1){
	$limit=($check1+$index);
	
	for(;$index<$limit;$index++){
		$row1=mysqli_fetch_array($result1);
		$list[$index]=$row1['username'];
	}
}
//var_dump($list);
//echo '<br>';

//no-interaction uni-follow
$sql2="select follower as username from Friends where followee='$host' and  follower<>all(select followee from Friends where follower<>'$host')";
$result2=mysqli_query($con, $sql2);
$check2=mysqli_num_rows($result2);

if($check2){
	$limit=($check2+$index);
	
	for(;$index<$limit;$index++){
		$row2=mysqli_fetch_array($result2);
		$list[$index]=$row2['username'];
	}
}
//var_dump($list);
//echo '<br>';

//random
$sql3="select username from Profile where username<>'$host' order by rand() limit $total";
$result3=mysqli_query($con, $sql3);
$limit=($total+$index);
for(;$index<$limit;$index++){
	$row3=mysqli_fetch_array($result3);
	$list[$index]=$row3['username'];
}

//var_dump($list);
//echo '<br>';

$list=array_flip(array_flip($list));
//var_dump($list);
//echo '<br>';

$list=array_slice($list,0,$total);
//var_dump($list);
return $list;
?>
