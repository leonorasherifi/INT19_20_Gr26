<?php
	session_start();
	$error="";
	$databaseError="";
	$success=false;

	if (isset($_COOKIE['rememberEmail']) and isset($_COOKIE['rememberPassword'])) {
		$cookie=true;
		$email=$_COOKIE['rememberEmail'];
		$password=$_COOKIE['rememberPassword'];
	}
	else if (isset($_POST['email']) and isset($_POST['password'])) {
		$cookie=false;
		$email=$_POST['email'];
		$password=$_POST['password'];

		if (empty($email) || empty($password)) {
			header("Location: login.php?login=empty");
			exit();
		}
	}

	//Lidhja me databaze
	if(isset($cookie)) {			
		include_once("dbConnect.php");

		if (!$cookie) {
			$email=fixInput($email);
			$password=fixInput($password);
		}

		$queryInsert="select * from users where uemail='".$email."'";
		$result=$db->query($queryInsert);

		if($result->num_rows){
			$row=$result->fetch_assoc();
			if (verifyPasswords($password,$row['upassword']) or ($cookie and $password==$row['upassword'])) {
				$_SESSION['uemail']=$row['uemail']; 
				$_SESSION['uphone']=$row['uphone'];
				$_SESSION['ufirstname']=$row['ufirstname'];
				$_SESSION['ulastname']=$row['ulastname'];
				if (!empty($_POST['remember']) and !$cookie ) {
					setcookie("rememberEmail",$row['uemail'], time()+172000);
					setcookie("rememberPassword", $row['upassword'],time()+172000);
				}					

				header("Location: buynow.php");	
				exit();				
			}
			else{
				header("Location: login.php?login=error");
				exit();
			}
		}
		else{
			header("Location: login.php?login=error");
			exit();
		}
		$db->close();

	}
	else{
		header("Location: login.php");
		exit();
	}

?>