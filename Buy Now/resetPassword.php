<?php
include("dbConnect.php");

	if (isset($_POST['emailReset'])) {
		if (empty($_POST['emailReset'])) {
			header("Location: resetEmail.php?login=empty");
			exit();
		}
		else if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $_POST['emailReset'])) {
			$error= "<p><b>Please type a valid email address</b></p>";
			header("Location: resetEmail.php?login=error");
			exit();
		}
		else{
			$email=fixInput($_POST['emailReset']);
			$queryInsert="select uemail,upassword from users where uemail='".$email."'";
			$result=$db->query($queryInsert);

			if($result->num_rows){
				$row=$result->fetch_assoc();
				$email_from = "smarthome.tk";
            	$email_subject = "Password Reset - Smarthome";
            	$email_body = "Click on this link to reset your password: http://localhost/SmartHome/Buy%20Now/reset.php?code=".$row['upassword'];

       			$to = $_POST['emailReset'];
        		$headers = "From: smart-home@noreply.com \r\n";

		
				mail($to,$email_subject,$email_body,$headers);
				header("Location: resetEmail.php?login=success");
				exit();
			}
			else{
				header("Location: resetEmail.php?login=error2");
				exit();
			}
		}
	}

	elseif (isset($_POST['resetPassword']) and isset($_POST['password']) and isset($_POST['passwordC'])) {
		if ($_POST['password']=="" or $_POST['passwordC']=="") {
			header("Location: resetEmail.php?login=empty");
			exit();
		}
		elseif ($_POST['password']!=$_POST['passwordC']) {
			header("Location: resetEmail.php?login=error");
			exit();
		}
		else {
			try {			
				$code=$_POST['code'];
				$salt="";
				$querySelect="select usalt from users where upassword='".$code."'";
				$res=$db->query($querySelect);				
				if ($res->num_rows) {
					$row=$res->fetch_assoc();
					$salt=$row['usalt'];
				}
								
				$newPassword=sha1($_POST['password'].$salt);		
				$queryUpdate="update users set upassword=? where upassword=?";

				$stmt=$db->stmt_init();
				if(!$stmt->prepare($queryUpdate)){
					$error->$stmt->error;
				}
				else{
					$stmt->bind_param("ss",$newPassword,$code);
					$stmt->execute();

					if($db->affected_rows){
						echo "<script>";
						echo "swal('Success!', 'Your password has been reseted', 'success');";
						echo "</script>";
						header( "refresh:3;url=login.php"); //automatic redirect
					}
					else{
						echo "<script>";
						echo "swal('Failure!', 'Please try again to reset password', 'error');";
						echo "</script>";
						header( "refresh:3;url=login.php"); //automatic redirect
					}
				}
			} 
			catch (Exception $e) {
				echo "<script>";
				echo "swal('Failure!', 'Please contact support', 'error');";
				echo "</script>";
				header( "refresh:3;url=login.php");
			}
		}
	}
		
	else{
		header("Location: login.php");
		exit();
	}

?>