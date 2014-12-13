<?php
	session_start();

	/*if(!isset($_SESSION['username'])){
	    echo '<script>alert("Please log in first!");url="../default.html";window.location.href=url;</script>';
	    //echo '<script>url="../default.html";window.location.href=url;</script>';
	}else*/
	if(isset($_SESSION['username'])){
	    echo '<script>alert("Log in successfully!");';
	    exit();
	}
	else
	    echo '<script>alert("Please log in first!");url="../default.html";window.location.href=url;</script>';
?>
