<html>
<script src="../sweetalert.js"></script>
</html>

<?php 

// Variablat per errore
$name_error = $lname_error = $email_error =
$address_error= $phone_error =  $zipcode_error =$foto_error=$ttype_error=$prod_error=$datefirst_error=$datelast_error= $cardnum_error=$seccode_error=$expdate_error=$cholder_error=$accept_error="";

$errors=false;

//variablat pervlerat e te dhenave
$name = $lname = $phone = $address = $zipcode =$prod=$datelast=$ttype= $cardnum= $seccode= $expdate= $cholder =$seccodemd5=$price="";



//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["username"])) {
		$name_error = "Name is required";
		$errors=false;
	} else {
		$name = test_input($_POST["username"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$name="";
			$name_error= "Only letters allowed"; 
			$errors=false;
		}
		else{
			$errors=true;
		}
	}

	if (empty($_POST["lastname"])) {
		$lname_error = "Last name is required";
		$errors=false;
	} else {
		$lname = test_input($_POST["lastname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
			$lname="";
			$lname_error = "Only letters allowed"; 
			$errors=false;
		}
		else{
			$errors=true;
		}

	}



	if (empty($_POST["phone"])) {
		$phone_error = "Phone is required";
		$errors=false;
	} else {
		$phone = test_input($_POST["phone"]);
		if (!preg_match("/^\+[[:digit:]]{11}$/",$phone)) {
			$phone="";
			$phone_error = "Invalid phone number"; 
			$errors=false;
		}
		else{
			$errors=true;
		}
	}

	if (empty($_POST["address"])) {
		$address_error = "Address is required";
		$errors=false;
	} else {
		$address = test_input($_POST["address"]);
		if (!preg_match("/^[#.0-9a-zA-Z\s,-]+$/",$address)) {
			$address="";
			$address_error = "Invalid address";
			$errors=false; 
		}
		else{
			$errors=true;
		}
	}


	if (empty($_POST["zipcode"])) {
		$zipcode_error = "Zip code is required";
		$errors=false;
	} else {
		$zipcode = test_input($_POST["zipcode"]);
		if (!preg_match("/^\d{4,5}([\-]?\d{4,5})?$/",$zipcode)) {
			$zipcode="";
			$zipcode_error = "Invalid postal code"; 
			$errors=false;
		}
		else{
			$errors=true;
		}
	}


	if (empty($_POST["file_img"])) {
		$foto_error = "A photo is required";
		$errors=false;
	}
	else{
		$errors=true;
	}
	

	if (isset($_POST["prod"]) && $_POST["prod"]!="") {
		$prod= test_input($_POST["prod"]);
		$errors=true;
	}
	else{
		$prod_error="Select one of the options";
		$errors=false;
	}

	if (isset($_POST["ttype"]) && $_POST["ttype"]!="") {
		$ttype= test_input($_POST["ttype"]);
		$errors=true;
	}
	else{
		$type_error="Select one of the options";
		$errors=false;
	}

	$price= test_input($_POST["price"]);


	if (empty($_POST["datelast"])) {
		$datelast_error = "Last date  is required";
		$errors=false;
	} else {
		$datelast = test_input($_POST["datelast"]);
		$errors=true;
	}

	$cardtype = array(
		"visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
		"mastercard" => "/^5[1-5][0-9]{14}$/",
		"smarthome"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
		"amex" => "/^([34|37]{2})([0-9]{13})$/",

	);


	if (empty($_POST["cardnumber"])) {
		$cardnum_error = "Card number is required";
		$errors=false;
	} 
	else {
		$cardnum = test_input($_POST["cardnumber"]);
		if ((!preg_match($cardtype['visa'],$cardnum)) &&
			(!preg_match($cardtype['mastercard'],
				$cardnum)) 
			&& (!preg_match($cardtype['smarthome'],$cardnum)) && (!preg_match($cardtype['amex'],$cardnum))){
			$cardnum="";
		$cardnum_error = "Card number is invalid";
		$errors=false;
	}
	else{
		$errors=true;
	}
}



if (empty($_POST["cardholder"])) {
	$cholder_error = "Card holder is required";
	$errors=false;

} else {
	$cholder = test_input($_POST["cardholder"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$cholder)) {
		$cholder="";
		$cholder_error = "Only letters allowed"; 
		$errors=false;
	}
	else{
		$errors=true;
	}
}



if (empty($_POST["expirationdate"])) {
	$expdate_error = "Exp date is required";
	$errors=false;
} else {
	$expdate = test_input($_POST["expirationdate"]);
	if (!preg_match("/^((0[1-9])|(1[0-s2]))\/(\d{4})$/",$expdate)) {
		$expdate="";
		$expdate_error = "Wrong format"; 
		$errors=false;
	}
	else{
		$errors=true;
	}
}


if (empty($_POST["securitycode"])) {
	$seccode_error = "CCV is required";
	$errors=false;
} else {
	$seccode = test_input($_POST["securitycode"]);
	$seccodemd5 = md5($seccode);
	if (!preg_match("/^[0-9]{3,4}$/",$seccode)) {
		$seccode="";
		$seccode_error = "Invalid CCV"; 
		$errors=false;
	}
	else{
		$errors=true;
	}
}



	if(isset($_POST['accept']) && $_POST['accept']!="")
	{
		$errors=true;
	}
	else{
		$accept_error="Accept Terms & Conditions";
		$errors=false;
	}
	}



if ($errors) {
	include 'dbConnect.php';
	$sql= "INSERT INTO personalinfos (name, lastname, phonenr, address, zipcode) VALUES ('$name', '$lname','$phone','$address','$zipcode')";

	$sql1 = "INSERT INTO productdetails  (ttype, datelast, prod) VALUES ('$ttype','$datelast','$prod')";

	$sql2 = "INSERT INTO paymentdetails (cardnum, cardholder, expdate, CCV, price) VALUES ('$cardnum', '$cholder', '$expdate', '$seccodemd5','$price')"; 

	if ( $db->query($sql) == true && $db->query($sql1) == true && $db->query($sql2) == true ){

		echo "<script>";
		echo "swal('Good job!', 'your order has been proceeded', 'success');";
		echo "</script>";
		header( "refresh:2;url=buynow.php"); //automatic redirect
	}
	
}
else{

}


                //if the query is successsful, redirect to welcome.php page, done!
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>