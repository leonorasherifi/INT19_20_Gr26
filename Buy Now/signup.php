
<!DOCTYPE html>
<html>
<head>
	<title>Smart Home</title>
	<link rel="stylesheet" href="../footer.css"/>
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="Top-selling/sell.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../scroll-up-button.css">
    <script src="../scroll-up.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="profileStyle.css">
    <script src="../sweetalert.js"></script>
    <script type="text/javascript" src="showdetails.js"></script>
</head>
<body>
<header>
	<h1 id="title">Smart Home</h1>
	<div class="nav">
		<ul>
			<li><a href="../home.html">Home</a></li>
			<li><a href="../About/about.html">About</a></li>
			<li><a href="#">Smart</a>
				<ul>
					<li><a href="../Smart/smart-heating/smart-heating.html">Heating</a></li>
					<li><a href="../Smart/smart-lighting/smart-lighting.html">Lighting</a></li>
					<li><a href="../Smart/smart-security/smart-security.html">Security</a></li>
				</ul>
			</li>
			<li><a href="../Top-selling/top-selling.html">Top</a></li>
  		    <li><a href="login.php">Buy</a></li>
            <li><a href="../contact/contact.php">Contact</a></li>
 		</ul>
	</div>
</header>

	<?php include("createAccount.php"); ?>
       <!-- Butoni per scroll up -->
	<button onclick="topFunction()" id="Btn"  title="Go to top"><p></p></button>

<div class="res"style="height:1000px;">
	<div id="container" style="margin-top:50px;">
		<div class="loginimage">

		
		<img src="../images/buy/team.png" style="width:550px;height:400px;float:left;
		margin-top:40px;margin-left:0px;">		
		<br>
		<h1 style="padding-left:10px; font-size:50px; ">Dream Big - START small</h1>
		<h2 style="padding-left:60px;font-size:25px;color:black;">Start by Sign up in here</h2>
	</div>
	<div class="loginF">
		<div id="signupFrame" class="accountForm">
		<form id="signup" method="post" action="">
			<h2>Sign up</h2>
			<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			    <input  type="text" class="form-control" name="first" placeholder="Fist Name" value="<?php if(isset($first))echo($first);?>">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			    <input  type="text" class="form-control" name="last" placeholder="Last Name" value="<?php if(isset($last))echo($last);?>">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			    <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php if(isset($phone))echo($phone);?>">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			    <input  type="text" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email))echo($email);?>">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="password" placeholder="Password">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="passwordC" placeholder="Confirm Password">
		  	</div>
		  	<div class="input-group error">
		  		<?php echo $error;?>
		  		<?php echo $databaseError?>
		  	</div>
		  	<div class="input-group" id="buttonBlock">
			    <input type="submit" class="form-control" name="createAccount" value="Create Account">
		  	</div>
		</form>
		</div>
	</div>
	</div>
</div>

<footer class="footer" >
	<div class="footer_container">
		<div class="footer-1 col-sm-4">
	      <img class="logo" src="../smart-home.png">
	    </div>

	    <div class="footer-3">
	      <h3 style="font-size: 40px;">Contact Us</h3>

	      <div>
	        <p class="company">...</p>
	        <p id="adr">Kosova </p>
	        <p id="adr">Pristina</p>
	        
	      </div>
	 
	      <div>
	        <p class="company">Tel:</p>
	        <p id="adr">+38344703042</p><br>
	      </div>
	 
	      <div>
	        <p class="company">Fix:</p>
	        <p id="adr">877-827-2385</p><br>
	      </div>

	      <div>
	        <address class="company">
	          Email:
	          <br>
	          <a href="mailto:lindaimmeri@gmail.com?Subject=Hello%20again" target="_top">lindaimmeri@gmail.com</a>
	          <br>
	          <a href="mailto:leonorasherifi@gmail.com?Subject=Hello%20again" target="_top">leonorasherifi@gmail.com</a>
	        </address>
	      </div>
	    </div>


	    <div class="footer-4">
	      <h3 style="font-size: 40px;">Keep Up To Date</h3>
	      <div class="footer-icons">      
	        <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a><p>Facebook</p>
	          <hr>
	        <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a><p>Twitter</p>
	          <hr>
	        <a href="https://www.flickr.com/photos/flickr/"><i class="fa fa-photo on fliokr"></i></a><p>Photo On Flickr</p>
	          <hr>
	        <a href="https://github.com/"><i class="fa fa-github"></i></a><p>Github</p>
	          <hr>
	      </div>
	    </div>

	</div>

</footer>

</body>
</html>