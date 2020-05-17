
<?php
	$error="";
	$databaseError="";
	$success=false;
	if (isset($_POST['first']) and isset($_POST['last']) and isset($_POST['phone'])
 and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['passwordC'])) {
		$first=$_POST['first'];
		$last=$_POST['last'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$passwordC=$_POST['passwordC'];

		if ($first==null || $last==null || $phone==null || $email==null || $password==null || $passwordC==null ) {
			$error= "<p><b>You have empty fields left. Please fill them</b></p>";
		}
		
		else if ($password!=$passwordC) {
			$error= "<p><b>You passwords don't mach. Please type them correctly</b></p>";
		}
		else if(strlen($password)<6){
			$error="<p><b>Short Password</b></p>";
		}
		
		else if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
			$error= "<p><b>Please type a valid email address</b></p>";
		}
		else if (!preg_match('/^\+[[:digit:]]{11}$/', $phone)) {
			$error= "<p><b>Please type a valid phone number</b></p>";
		}
		else{
			$success=true;			
		}




		//Lidhja me databaze
		if ($success) {	

			$first=fixInput($first);
			$last=fixInput($last);
			$phone=fixInput($phone);
			$email=fixInput($email);
			$password=sha1(fixInput($password));

			@ $db =new mysqli('localhost:3306','root','');
			if(mysqli_connect_errno()){
				echo "<script>";
		echo "swal('Failure!', 'Please try again to sign up', 'error');";
		echo "</script>";
				$databaseError= "<p>Connection with the database failed! Try again later!</p>";
				exit();
			}
			$db->select_db('smarthome');
			$queryInsert="insert into users(ufirstname, ulastname, uphone, uemail, upassword) values ('".$first."', '".$last."', '".$phone."', '".$email."', '".$password."')";
			$execute=$db->query($queryInsert);				
			if($execute and $db->affected_rows){
				echo "<script>";
				echo "swal('Success!', 'Your account has been created', 'success');";
				echo "</script>";
				header( "refresh:5;url=login.php"); //automatic redirect
			}
			else{
				echo "<script>";
				echo "swal('Failure!', 'Please try again to sign up', 'error');";
				echo "</script>";
			}
			$db->close();

		}
		
	}
	

	function fixInput($input){
		$input= trim($input);
		$input= htmlspecialchars($input);
		$input= addslashes($input);

		return $input;
	}
?>
