<?php
    include 'config.php';
    include 'functions.php';
    if (isset($_POST['newWord'])) unset($_SESSION['answer']);
    $value="";
    $pyetja="";
    if (!isset($_SESSION['answer']))
    {
        $_SESSION['mundësi'] = 0;
        $answer = fetchWordArray($WORDLISTFILE);
       $value=implode($answer);
       
          if ($value=="smarthome") {
            $pyetja="<h2>Comfort and safe home</h2>";
            }
            else if ($value=="kosova") {
              $pyetja="<h2>Our country</h2>";
            }
            else if ($value=="php") {
               $pyetja="<h2>Hypertext Preprocessor</h2>";
             }
              else if ($value=="fiek") {
               $pyetja="<h2>Fakulteti teknik</h2>";
             }
            
        
        $_SESSION['answer'] = $answer;
        $_SESSION['hidden'] = hideCharacters($answer);
        echo 'Opportunities left: '.( $MAX_MUNDËSI- $_SESSION['mundësi']).'<br>';
    }else
    {
        if (isset ($_POST['userInput']))
        {
        
            $userInput = $_POST['userInput'];
            $_SESSION['hidden'] = checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
            checkGameOver($MAX_MUNDËSI,$_SESSION['mundësi'], $_SESSION['answer'],$_SESSION['hidden']);

        }
        $_SESSION['mundësi'] = $_SESSION['mundësi'] + 1;
        echo 'Opportunities left: '.( $MAX_MUNDËSI- $_SESSION['mundësi'])."<br>";

    }
    $hidden = $_SESSION['hidden'];
    foreach ($hidden as $char) echo $char."  ";
           echo "</br>";
            echo "$pyetja";
?>