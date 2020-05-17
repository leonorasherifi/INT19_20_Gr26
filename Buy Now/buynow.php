<?php
  session_start();
?>

<html>
<head>
	<title>Smart Home</title>
    <link rel="stylesheet" href="../footer.css"/>
    <link rel="stylesheet" href="../header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Top-selling/sell.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="profileStyle.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="../scroll-up-button.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="../scroll-up.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php 
  include('form_process.php');
  ?>
    <style type="text/css">
<style>
	body {
	   background-color: white;
	color:black;
	margin:0;
	padding:0;
	font-family: Garamond;

}
.logincont{
	height: 2000px;
   background: url(../images/buy/blur.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  margin-bottom:-100px;
	
}
table {
    border-collapse: collapse;
    background-color:white;
    padding: 20px 20px 20px;
    border-radius: 3px;
    box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
}
tr{
    margin-bottom: 40px;
}
 td {
    font-family:"Trebuchet MS",tahoma; 
    font-size:20px;
    padding: 5px;
    padding-bottom: 30px;
    text-align: center;
}

th {text-align: left;}

th {text-align: left;}
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
   

<div id="userBar">
  <span style="color:white; text-align: left; font-size: 60px;margin-top:90px; margin-left: 30px; float: left; ">Buy Now</span>
  <span id="logoutLabel">
    <form action="logout.php">
      <button type="submit" name="submit" style="background-color:black;color:white;margin-top:100px;">
        Logout
      </button>
    </form>
  </span> 
  <span id="userLabel" style="color:white;margin-top:100px;">
  <?php 
      if (isset($_SESSION['ufirstname']) and isset($_SESSION['ulastname'])) {
          echo $_SESSION['ufirstname']." ".$_SESSION['ulastname'];
      }
      else{
        header("Location: login.php");
        exit();
      }
  ?>
  </span> 
</div>


<!-- Butoni per scroll up -->
<button onclick="topFunction()" id="Btn"  title="Go to top"><p></p></button>
<div class="buy-container">
  <div class="row">
    <div class="col-sm-7 product-details">
      <div id="test">
        <?php
            include_once('dbConnect.php');

            $sql="select * from classes where classid = '1'";
            $result = $db->query($sql);

            echo "<table cellspacing='0' cellpadding='0'>";

            if($result)
            {
            while($row = $result->fetch_array()) {    
                echo "<tr>";
                echo "<td colspan='3'><img src='" . $row['product'] . "' width='100%'></td>";
                echo "</tr>";       
                echo "<tr>";
                echo "<td colspan='3'><span style='font-weight:bold'>Welcome Pack:</span>" . $row['buypack'] . "</td>";
                echo "</tr>";            
                echo "<tr>";
                echo "<td colspan='3'></td>";
                echo "</tr>";            
              }
            }
            echo "</table>";

        ?>
      </div> 
    </div>
    <div class="col-sm-5 product-form">
      <section class="smarthome">
      <h1 style="color: black">Buy Now</h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  

              <h2 style="color:#694551; font-weight: bold; font-size: 17px;">Step one</h2>
          <div class="smart personal_info">

               <h3 style="font-weight: bolder; font-size: 15px">Your Personal Information</h3>

                        <div class="row">
                              <div class="col-sm-6">
                                <?php
                              
                                    include_once('dbConnect.php');
                                    $email = $_SESSION['uemail'];
                                    $query = "select ufirstname, ulastname, uphone from users where uemail = '$email';";
                                    $rez =$db->query($query);
                                    if($rez)
                                    {
                                      while($row = $rez->fetch_array())
                                      {
                                        $name = $row['ufirstname'];
                                        $lname = $row['ulastname'];
                                        $phone = $row['uphone'];
                                    }
                                  }
                                  
                                  ?>
                                <fieldset>
                                    <input type="text" name="username" id="username" placeholder="Your Name" value="<?= $name ?>" >
                                          </br>
                                    <span class="error"><?= $name_error ?></span>
                             </fieldset>
                              </div>
                               <div class="col-sm-6">
                                 <fieldset >
                                    <input type="text" name="lastname" id="lastname" placeholder="Your Lastname"
                                    value="<?= $lname ?>" />
                                         </br>
                                    <span class="error" ><?= $lname_error ?></span>
                              </fieldset>
                               </div>                              
                       </div>

                              <fieldset>
                                    <input type="text"  name="phone" id="phonenr" placeholder="Your phone number" value="<?= $phone ?>" />
                                    </br>
                                    <span class="error" ><?= $phone_error ?></span>
                              </fieldset>


                              <fieldset>
                                     <input type="text" name="address" value="<?= $address ?>" placeholder="Your Address">
                                     <span class="error"><?= $address_error ?></span>
                              </fieldset>


                              <fieldset>
                                   <input type="text" name="zipcode" id="zipcode" value="<?= $zipcode ?>" placeholder="Zip code">
                                   <br/>
                                   <span class="error"><?= $zipcode_error ?></span>
                              </fieldset>

                              <br/>

                              <fieldset>
                                  <h3 style="font-size: 15px; padding-bottom: 10px;">A photo of you, for identification</h3>
                                  <input type="file" name="file_img" accept="image/*"><br/>
                                  <span class="error"><?= $foto_error ?></span>
                              </fieldset>

          </div>

                     
               <br/>
               <h2 style="color:#694551; font-weight: bold; font-size: 17px">Step two</h2>
          <div class="smart buying">

                           <h3 style="font-weight: bolder; font-size: 15px">Product details</h3>

                                  </br>
                                  <h3>Product type</h3>

                                <fieldset> 
                                      <select name="ttype" onchange="showUser(this.value)">
                                          <option disabled selected value>   select an option  </option>
                                          <option value="1">Lighting product</option>
                                          <option value="2">Heating product</option>
                                          <option value="3">Secure product</option>
                                      </select>
                                      <span class="error"><?= $ttype_error ?></span>
                                </fieldset>     

                                  <h3>When do you want to get the product</h3>

                                  <div class="flex">
                                      

                                    <fieldset >
                                          <input type="date" name="datelast" value="<?= $datelast ?>" placeholder="date" id="datelast"></br>
                                          <span class="error"><?= $datelast_error ?></span>
                                      </fieldset>
                                  </div>
                                  

                                    <h3>The product you want to buy</h3>
                                <fieldset>
                                    <select name="prod" onchange="optionchange()"> 
                                        <option disabled selected value value="1">   select an option  </option>
                                        <option value="Evohome">Evohome</option>
                                        <option value="NestThermostat">Nest Themostat</option>
                                        <option value="Wiser">Wiser</option>
                                        <option value="HiveAktiveHeating">Hive Aktive Heating</option>
                                        <option value="NestWifi">Nest Wifi</option>
                                        <option value="Rabbacum">Rabbacum</option>
                                        <option value="Smartlock">Smartlock</option>
                                        <option value="SmartFlushCeiling">Smart Flush Ceiling</option>
                                        <option value="SmartWiFiLightBulb">Smart Flush Ceiling</option>
                                        <option value="FlexLinkers">Flex Linkers</option>
                                        <option value="PhilipsHue">Philips Hue</option>
                                        <option value="StickupCamera">Stick up Camera</option>
                                        <option value="Ring-Alarm">Ring-Alarm</option>
                                        <option value="RingSmartLighting">Ring Smart Lighting</option>
                                        <option value="SmartLockDoor">Smart Lock Door</option>
                                    </select>
                                  <span class="error"><?= $prod_error ?></span>
                              </fieldset>

                                 <fieldset >
                                         <h3 style="display: inline; font-weight: bold;font-size: 15px;">Total price: </h3> <input type="text" name="price" value=""  id="price" style="width: 50px; display: inline">
                                 </fieldset>
                                 
                                 <textarea name="textarea" id="">More informations</textarea>

           </div>

                     
             </br>
            <h2 style="color:#694551; font-weight: bold; font-size: 17px">Step three</h2>
          <div class="smart carddetails">

                            <div style="display: flex;justify-content: space-between;">
                                <h3 style="font-weight: bolder; font-size: 15px;">Payment details</h3>
                                <img src="../images/buy/card.png" alt="" height="30px" width="200px">
                            </div>

                            <br/>

                              <h3>Your card number</h3>
                              <fieldset>
                                  <input type="text" name="cardnumber" value="<?= $cardnum ?>" placeholder="Valid card number" id="cardnum">
                                  <span class="error"><?= $cardnum_error ?></span>
                              </fieldset>


                              <fieldset>
                                  <input type="text" name="cardholder" value="<?= $cholder ?>" placeholder="Card holder" id="cardholder">
                                  <span class="error"><?= $cholder_error ?></span>
                              </fieldset>



                        <div class="flex"> 
                                 <fieldset>
                                       <h3>Expiration date</h3>  
                                        <input type="text" name="expirationdate" id="expdate" value="<?= $expdate ?>" placeholder="mm/yyyy" id="expdate" > 
                                        <br/>
                                        <span class="error"><?= $expdate_error ?></span>
                                  </fieldset>

                                  <fieldset>
                                        <h3>Security code</h3>
                                        <input type="text" name="securitycode" id="CCV" value="<?= $seccode ?>" placeholder="CVC" >
                                        <br/>
                                        <span class="error" ><?= $seccode_error ?></span>     
                                  </fieldset>
                         </div>

         </div>

                    <div class="check">
                                <p class="terms" >
                                  <label>
                                    <input type="checkbox" name="accept" id="accept">
                                    I accept Terms & Conditions
                                  </label>
                                  <p class="submit"><input type="submit" name="submit" value="Submit"></p>
                                </p>

                               </br>
                              <span class="error" ><?= $accept_error ?></span>
                      </div>
     
        </form>
      </section>
    </div>
  </div>  
 </div>

  

<script type="text/javascript">
  function showUser(str) {
        
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("test").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET","getuser.php?q="+str,true);
          xmlhttp.send();    
  }



  function optionchange(){
    var randnum=Math.floor(Math.random() * (400 + 1)) + 100;
    document.getElementById('price').setAttribute("value",randnum+" $");
  }
</script>





</div>
<footer class="footer">
  <div class="footer_container" style="height: 380px;">
      
      
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