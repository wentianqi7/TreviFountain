<?php
session_start();
$con=include('/home/trevifountain/public_html/conn.php');
$name=$_SESSION['username'];
$a_date=date("Y-m-d H:i:s");
$sql="SELECT COUNT(distinct wish_id) as number,username,type FROM Updating WHERE username='$name' group by username,type;";
$result=mysqli_query($con, $sql);
$check=mysqli_num_rows($result);

$q0 = "select max(aid) as large from Achievement";
$sql0 = mysqli_query($con, $q0);
$row0=mysqli_fetch_array($sql0);
$aid=$row0['large'];

if($check){
	while($row=mysqli_fetch_array($result)){
		$number=$row['number'];
		$type=$row['type'];
		$aid++;
		
		switch($type){
		case 0:
			switch($number){
			case 5:
				$a_title='Just A Hobby';
				$a_descp='The User has posted five wishes on the board.';
				break;
			case 1:
				$a_title='First Post!';
				$a_descp='The User has posted his/her first wish on the board.';
				break;
			default:
				break;
			}
			break;
		case 1:
			switch($number){
			case 1:
				$a_title='First Blood!';
				$a_descp='The User has taken his/her first wish from the board.';
				break;
			case 5:
				$a_title='Wishing Well';
				$a_descp='The User has taken five wishes from the board.';
				break;
			default:
				break;
			}
			break;
		default:
			break;
		}
		
		$q1 = "select* from Achievement where username='$name' AND title='$a_title';";
		$result0=mysqli_query($con, $q1);
		$check0=mysqli_num_rows($result0);
		if(!$check0){
			$q="insert into Achievement values ('$aid', '$a_title', '$a_descp', '$name', '$a_date','new');";
			mysqli_query($con, $q);
		}
	}
	
}

return include('remind_achievements.php');

?>
