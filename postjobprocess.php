<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">
    <title>Job Process</title>
</head>
<body>
    
    
    <section class="header">
    <?php
    require_once("header.inc");
    ?>
    </section>

    <?php
    function checking_integrity($line, $i)
    {
        $check = true;
        $remainingword = "";
        if ($i==0)
        {   
            $checkword = "PositionID: ID";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                $pattern = "/^[0-9]{3}$/";
                if (!preg_match($pattern, substr($line, strlen($checkword))))
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
            }
        }
        elseif ($i == 1) 
        {
            $checkword = "Title: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                $pattern = "/^[a-zA-Z0-9\?\!\,\.\s\/\-]*$/";
                if (!preg_match($pattern, substr($line, strlen($checkword))))
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
            }
        }
        elseif ($i == 2) 
        {
            $checkword = "Description: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                $pattern = "/^[a-zA-Z0-9\?\!\,\.\s\/\-]*$/";
                if (!preg_match($pattern, substr($line, strlen($checkword))))
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
            }
        }
        elseif ($i == 3) 
        {
            $checkword = "ClosingDate: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                $pattern = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/[0-9]{4}$/";
                
                if (!preg_match($pattern, substr($line, strlen($checkword))))
                {
                    $check = false;
                }
                else
                {
                    $dateWithDashes = str_replace("/", "-", substr($line, strlen($checkword)));
                    $remainingword = $dateWithDashes;
                }
            }
        }
        elseif ($i == 4) 
        {
            $checkword = "Position: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                if (substr($line, strlen($checkword)) != "Full-Time" && substr($line, strlen($checkword)) != "Part-Time")
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
                
            }
        }
        elseif ($i == 5) 
        {
            $checkword = "Contract: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                if (substr($line, strlen($checkword)) != "On Going" && substr($line, strlen($checkword)) != "Fixed Term")
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
                
            }
        }
        elseif ($i == 6) 
        {
            $checkword = "Location: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                if (substr($line, strlen($checkword)) != "On Site" && substr($line, strlen($checkword)) != "Remote")
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
                
            }
        }
        elseif ($i == 7) 
        {
            $checkword = "Email: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                if (!filter_var(substr($line, strlen($checkword)), FILTER_VALIDATE_EMAIL))
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
                
                
            }
        }
        elseif ($i==8)
        {   
            $checkword = "Phone: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                $pattern = "/^[0-9]+$/";
                if (!preg_match($pattern, substr($line, strlen($checkword))))
                {
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
            }
        }
        elseif ($i==9)
        {   
            $checkword = "AcceptBy: ";
            if (strpos($line,$checkword) !== 0)
            {
                $check = false;
            }
            else
            {
                if ((!fnmatch("Post*", substr($line, strlen($checkword))))&&(!fnmatch("Mail*", substr($line, strlen($checkword)))))
                {
                    echo "<p>".substr($line, strlen($checkword))."</p>";
                    $check = false;
                }
                else
                {
                    $remainingword = substr($line, strlen($checkword));
                }
            }
        }

        else
        {

        }
        $result = [$check, $remainingword];
        return $result;
    }













    $jobs = array();
    $file_name = "data/positions.txt";
    $handle = fopen($file_name,"r");
    
    $i = 0;
    $errorline = 1;
    /* while ((!feof($handle)))
    {
        $line = fgets($handle);
        for ($index = 0; $index < strlen($line); $index++) {
            $char = $line[$index];
            $ascii = ord($char); 
            
            
            if ($ascii < 32 || $ascii > 126) {
                echo "<p>Character at position $index is non-printable: ASCII $ascii</p>";
            } else {
                echo "<p>Character at position $index is '$char': ASCII $ascii</p>";
            }
        }
    } */


    
    $tempstatus = true;
    while ((!feof($handle))&&($tempstatus)) { 
        $job = array();
        $line = fgets($handle); 
        if (!empty($line))
        {
        /* for ($index = 0; $index < strlen($line); $index++) {
            $char = $line[$index];
            $ascii = ord($char); 
            
            
            if ($ascii < 32 || $ascii > 126) {
                echo "<p>Character at position $index is non-printable: ASCII $ascii</p>";
            } else {
                echo "<p>Character at position $index is '$char': ASCII $ascii</p>";
            }
        } */
        $wordarray = preg_split('/\t/',$line);
        foreach ($wordarray as $oneword)
        {   
            
            $modifiedword = htmlspecialchars($oneword); 
            $oneword = trim($modifiedword, "\r\n\t");
            

            
        }
        
        $jobindex = 0;
        while ($jobindex < 10)
        {

            $status = checking_integrity($wordarray[$jobindex],$jobindex);
            $tempstatus = $status[0];
            if (!$status[0])
            {
                $line = $wordarray[$jobindex];
                /* for ($index = 0; $index < strlen($line); $index++) {
                    $char = $line[$index];
                    $ascii = ord($char); 
                    
                    
                    if ($ascii < 32 || $ascii > 126) {
                        echo "<p>Character at position $index is non-printable: ASCII $ascii</p>";
                    } else {
                        echo "<p>Character at position $index is '$char': ASCII $ascii</p>";
                    }
                } */
                echo "Error at $errorline line, $jobindex index";
                

            }
            else
            {
                $job[$jobindex] = $status[1];
            }
            $jobindex++;

        }
        
        $jobs[] = $job;
        $errorline++;


        /* $lastChar = $line[strlen($line) - 1];
        $asciiValue = ord($lastChar);
        echo $asciiValue;
        if ($asciiValue == 10) 
        {
            $line = substr($line,0,-2);
        } */
        /* $oneline = rtrim($line, "\r\n");
        $oneline = htmlspecialchars($oneline);
        




        $status = checking_integrity($oneline,$i);
        $tempstatus = $status[0];
        if (!$status[0])
        {
            echo "<p>Error at $errorline <p>";
        }
        else
        {
            $job[] = $status[1];
        }
        $i++;
        $errorline++;
        if ($i > 9)
        {
            $i = 0;
            $jobs[] = $job;
            $job = [];
        } */
        }
        


        
    }



    fclose($handle);




    $file_name = "data/positions.txt";
    $handle = fopen($file_name,"a");



    $missing = false;
    $positionID = $_POST["positionid"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $closingdate = $_POST["closingdate"];
    $position = $_POST["position"];
    $contract = $_POST["contract"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    if (!empty($_POST["acceptby"]))
    {
        $acceptby = $_POST["acceptby"];
    }
    else
    {
        $acceptby = "";
    }

    if ((empty($_POST["positionid"]))||(empty($_POST["title"]))||(empty($_POST["description"]))||(empty($_POST["closingdate"]))||(empty($_POST["position"]))||(empty($_POST["contract"]))||(empty($_POST["location"]))||(empty($_POST["email"]))||(empty($_POST["phone"]))||(empty($_POST["acceptby"])))
    {
        $missing = true;
    }

    foreach ($jobs as $onejob)
    {
        if (fnmatch("*$onejob[0]*", $_POST["positionid"]))
        {
            $missing = true;
        }
    }


    if (!$missing)
    {
        $data = "PositionID: $positionID\tTitle: $title\tDescription: $description\tClosingDate: $closingdate\tPosition: $position\tContract: $contract\tLocation: $location\tEmail: $email\tPhone: $phone\tAcceptBy: ";
        $length = count($acceptby);
        $aindex = 0;
        while ($aindex < $length)
        {
            if ($aindex == $length - 1)
            {
                $data .= $acceptby[$aindex];
            }
            else
            {
                $data .= "$acceptby[$aindex], ";
            }
            $aindex++;
            
        }
        $data .= "\n";
        fwrite($handle,$data);
        
        echo "<p>Your job ad has been recorded and stored.</p>";
    }
    else
    {
        echo "<p>Please fill in the necessary information or check if your position ID is not available</p>";
    }
    fclose($handle);
    echo "<div><a href=\"index.php\">Go back to homepage</a></div><br>";
    echo "<div><a href=\"jobpostform.php\">Go back to Job Posting Form</a></div><br>";
    echo "<div><a href=\"searchjobprocess.php\">See all jobs listing</a></div><br>";


    require_once("footer.inc");




    ?>
</body>