<?php

    function fetchWordArray($wordFile)
    {
        $file = fopen($wordFile,'r');
           if ($file)
        {
            $random_line = null;
            $line = null;
            $count = 0;
            while (($line = fgets($file)) !== false) 
            {
                $count++;
                if(rand() % $count == 0) 
                {
                      $random_line = trim($line);
                }
        }
        if (!feof($file)) 
        {
            fclose($file);
            return null;
        }else 
        {
            fclose($file);
        }
    }
        $answer = str_split($random_line);
        return $answer;
    }

    function hideCharacters($answer)
    {
        $noOfHiddenChars = floor((sizeof($answer)/2) + 1);
        $count = 0;
        $hidden = $answer;
        while ($count < $noOfHiddenChars )
        {
            $rand_element = rand(0,sizeof($answer)-2);
            if( $hidden[$rand_element] != '_' )
            {
                $hidden = str_replace($hidden[$rand_element],'_',$hidden,$replace_count);
                $count = $count + $replace_count;
            }
        }
        return $hidden;
    }

    function checkAndReplace($userInput, $hidden, $answer)
    {
        $i = 0;
        $wrongGuess = true;
        while($i < count($answer))
        {
            if ($answer[$i] == $userInput)
            {
                $hidden[$i] = $userInput;
                $wrongGuess = false;
            }
            $i = $i + 1;
        }
        if (!$wrongGuess) $_SESSION['mundësi'] = $_SESSION['mundësi'] - 1;
        return $hidden;
    }
    
    function checkGameOver( $MAX_MUNDËSI,$usermundësi, $answer, $hidden)
    {
        if ($usermundësi >= $MAX_MUNDËSI)
            {
                echo "Game Over. The correct word was ";
                foreach ($answer as $letter) echo $letter;
                echo '<br><form action = "" method = "post"><input type = "submit" name="newWord" value = "Try another word"/></form><br>';
                die();
            }
            if ($hidden == $answer)
            {
                echo "End of Game.You Won, You guessed the correct word ";
                foreach ($answer as $letter) echo $letter;
                echo '<br><form action = "" method = "post"><input type = "submit" name ="newWord" value = "Try another word"/></form><br>';
                die();
            }
    }
?>