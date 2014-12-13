<?php
	session_start();
	
	if(!isset($_SESSION['username']))
	    echo '<script>alert("Please log in first!");url="http://web.engr.illinois.edu/~trevifountain/home.html";window.location.href=url;</script>';
	    
	return;
?>
