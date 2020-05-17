<?php
	session_start();
	if (isset($_SESSION['uemail'])) {
		header("Location: buynow.php");
		exit();
	}
	else if (isset($_COOKIE['email'])) {
		header("Location: loginVerify.php");
		exit();
	}
?>
<html>
<head>
	<title>Smart Home</title>
    <link rel="stylesheet" href="../footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Top-selling/sell.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="profileStyle.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../scroll-up-button.css">
    <script src="../scroll-up.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
<style>
	body {
	   background-color: white;
	color:white;
	margin-left:0;
	padding:0;
	font-family: Garamond;
}
.logincont{

	height: 400px;


}
</style>
	

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
<div class="logincont">

       <!-- Butoni per scroll up -->
	<button onclick="topFunction()" id="Btn"  title="Go to top"><p></p></button>
    
	<div id="container">
		<div class="loginimage">
			<h2 style="padding-left:60px;font-size:25px;color:black;margin-top:10px;">Welcome !<br> We provide a simple, friendly and affordable <br>smart home system</h2>
		<img src="../images/buy/login.png" style="width:400px;height:600px;float:left;
		margin-top:20px;margin-left:100px;">
		
	</div>
	<div class="loginF" style="margin-top:280px;">
		<div id="loginFrame" class="accountForm">
		<form id="signup" method="post" action="loginVerify.php">
			<h2>Sign In</h2>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			    <input  type="text" class="form-control" name="email" placeholder="Email">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="password" placeholder="Password">
		  	</div>
		  	<div class="input-group" id="textBlock">
		  		<input type="checkbox" name="remember"><label>Remember Me</label>
			    <p><a href="resetEmail.php">Forgot Password?</a></p>
		  	</div>
		  	<div class="input-group" id="buttonBlock">
			    <input type="submit" class="form-control" name="createAccount" value="Login">
		  	</div>
		  	<div class="input-group error">
		  		<?php if (isset($_GET['login'])) {
		  			if ($_GET['login']=="empty") {
		  				echo "<p>Empty fields left!</p>";
		  			}
		  			else{
		  				echo "<p>Wrong email or password!</p>";
		  			}
		  		}?>
		  	</div>
		  	<div class="input-group" style="margin-top: -20px;">
		  		<hr>
			    <p style="text-align: center;color:white;">Don't have an account? <b><a href="signup.php">REGISTER HERE</a></b></p>
		  	</div>
		</form>
		</div>
	</div>
</div>



</div>
<footer class="footer"style="margin-top:700px;">
  <div class="footer_container">
      
      
    <div class="footer-1" style="width: 30%;margin-top:50px;">
      <img class="logo" src="../smart-home.png">
    </div>

    
 
    <div class="footer-3" style="width: 35%;margin-top:20px;margin-left:100px;">
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
    
    <div class="footer-4" style="width: 20%;">
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