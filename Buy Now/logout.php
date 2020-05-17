<?php
	session_start();
	if (isset($_SESSION['uemail'])) {	
		session_unset();
		session_destroy();
		if (isset($_COOKIE['rememberEmail']) and isset($_COOKIE['rememberPassword'])) {
			setcookie("rememberEmail",$row['uemail'], time()-3600);
			setcookie("rememberPassword", $row['upassword'],time()-3600);
		}
		header("Location: login.php");		
		exit();
	}

?>