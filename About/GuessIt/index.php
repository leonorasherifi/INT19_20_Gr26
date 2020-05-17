<?php session_start(); ?>
<!DOCTYPE html>
<head>
<title>Hangman</title>
<script src="../jQuery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Fajlat  external per css dhe javascript -->
   <link rel="stylesheet" href="../../header.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../../scroll-up-button.css">
    <script src="../../scroll-up.js"></script>
    <script src="../../jQuery.js"></script>
</head>
  
<header style="margin-top:-300px;">
  <h1 id="title">Smart Home</h1>
  <div class="nav">
    <ul>
      <li><a href="home.html">Home</a></li>
      <li><a href="About/about.html">About</a></li>
      <li><a href="#">Smart</a>
        <ul>
          <li><a href="Smart/smart-heating/smart-heating.html">Heating</a></li>
          <li><a href="Smart/smart-lighting/smart-lighting.html">Lighting</a></li>
          <li><a href="Smart/smart-security/smart-security.html">Security</a></li>
        </ul>
      </li>
      <li><a href="Top-selling/top-selling.html">Top</a></li>
      <li><a href="Buy Now/login.php">Buy</a></li>
        <li><a href="contact/contact.php">Contact</a></li>
    </ul>
  </div>
</header>
 
<div class="content" style="color: black;background-color:#7c5673; font-size: 30px;margin-top:300px;margin-left:200px;margin-right:200px; border:2px solid black;height: 400px;padding-left:200px;padding-top:30px;" >
<?php 
include("change.php");
 ?>

<script type="application/javascript">
    function validateInput()
    {
    var x=document.forms["inputForm"]["userInput"].value;
    if (x=="" || x==" ")
      {
          alert("Please write a character");
          return false;
      }
    if (!isNaN(x))
    {
        alert("Just letters are allowed.");
        return false;
    }
}
   
</script>
<form name ="form" id="form" method="post" >
Write a character: <input name = "userInput" type = "text" size="1" maxlength="1"  />
<input type = "submit"  value = "Check" onclick="return validateInput()"/>
<input type = "submit" name="newWord" id="newWord" value = "Try another word"  />
</form>
</div>

  
</body>
</html>