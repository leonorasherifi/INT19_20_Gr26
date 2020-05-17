<?php
	@ $db =new mysqli('localhost:3306','root','','smarthome');
			if(mysqli_connect_errno()){
				$databaseError= "<p>Connection with the database failed! Try again later!</p>";
				exit();
			}


	function fixInput($input){
		$input= trim($input);
		$input= htmlspecialchars($input);
		$input= addslashes($input);

		return $input;
	}
	
	function verifyPasswords($password, $dbPassword){
		$password=sha1($password);
		if ($password==$dbPassword) {
			return true;
		}
		else{
		return false;
		}
	}
?>