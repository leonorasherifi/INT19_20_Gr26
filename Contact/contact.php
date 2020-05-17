<?php
// define variables and set to empty values
ini_set('SMTP','smtp.googlemail.com');
ini_set('smtp_port',25);
$nameErr = $emailErr = $messageErr  = "";
$name = $email = $message = "";
$root= $_SERVER['DOCUMENT_ROOT'];

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(empty($_POST["name"])) 
    {
        $nameErr = "Name is required";
    } 
    else 
    {
        $name = test_input($_POST["name"]);
        if(preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
            $nameErr = "";
        else
            $nameErr = "Incorrect name";
    }
  
    if(empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    } 
    else 
    {
        $email = test_input($_POST["email"]);
        if(preg_match("/(^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$)/",$email))
            $emailErr = "";
        else 
        {
            $emailErr="Email not in right format";
        }
    }
    if(empty($_POST["message"]))
    {
        $messageErr = "Message is required";
    }
    else
    {
        $message = test_input($_POST["message"]);
        $messageLength=preg_split("//", $message);
        if (count($messageLength)>200 ) {
          $messageErr="Message too long!";
          $message='';
        }
    }
    if(!($name=='')&&!($email=='')&&!($message==''))
    {
        if(preg_match("/(^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$)/",$email))
        {
            $name = $_POST['name'];
            $visitor_email = $_POST['email'];
            $message = $_POST['message'];

            $email_from = "smarthome.com";
            $email_subject = "New Form Submission";
            $email_body = "User Name: $name.\n".
                          "User Email: $visitor_email.\n".
                          "User Message: $message.\n";

            $to = "linndaimmeri@gmail.com";
            $headers = "From: $email_from \r\n";
            $headers .= "Reply-To: $visitor_email \r\n";

            @$file=fopen("$root/../contacts.txt", 'ab');
            if(!$file){
              echo "We can't send this message at the moment. Please try again later";
              exit();
            }
            else{
              $date=date('H:i, jS F Y');
              $messageFormat=sprintf("%s\r\n%s\r\n%s\r\n%s\r\n-------------\r\n",$name, $visitor_email, $message,$date);
              try {
                if (!flock($file, LOCK_EX)) {
                  throw new Exception("Error While Locking The While", 403);
                  
                }
                fwrite($file, $messageFormat);
                flock($file, LOCK_UN);
              } catch (Exception $e) {
                echo $e->getMessage();
              }
              
              fclose($file);

              mail($to,$email_subject,$email_body,$headers);
              header("Location:contact.php?success=true");
            }
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  ?>
<head>
    <title>Contact Us</title>    
    <script src="../sweetalert.js"></script>
    <meta lang="en">
    <meta charset="utf-8">
    <link rel="stylesheet" href="contact.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../footer.css"/>
    <link rel="stylesheet" href="../header.css">
   
    <link rel="stylesheet" href="../scroll-up-button.css">
    <script src="../scroll-up.js"></script>

            <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">

        
     
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
      <li><a href="../Buy Now/login.php">Buy</a></li>
      <li><a href="contact.php">Contact</a></li>    </ul>
  </div>
</header>

<div class="contact">
           <div class="contact-title">
               <h1>Have any questions? </h1>
               <h2>We are always ready to serve you!</h2>
           </div>
           <div class="contact-form">
               <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                   <input type="text" name="name" class="form-control" placeholder="Your name!" value="" ><br/>
                   <span class="error"><?php echo $nameErr;?></span>
                   <br/>
                   <input name="email" type="text" class="form-control" placeholder="Your email" ><br/>
                   <span class="error"><?php echo $emailErr;?></span>
                   <br/>
                   <textarea name="message" class="form-control" placeholder="Message" rows="4" ></textarea><br/>
                   <span class="error"><?php echo $messageErr?></span>
                   <br/>
                   <input type="submit" class="form-control submit" value="SEND MESSAGE">
               </form>
               <?php
                if(isset($_GET["success"])) 
                  {

                   echo "<script>";
                   echo "swal('Success!', 'Your message has been sent', 'success');";
                   echo "</script>";
                   
                   } 

               ?>
           </div>
</div>




<footer class="footer">
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