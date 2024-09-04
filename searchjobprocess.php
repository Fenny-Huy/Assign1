<!DOCTYPE html>
<html lang="en">
<head>
<title>Jobs</title>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">
    <title>Returned Result</title>
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



        /* $jobtitles = [];
        $jobposition = [];
        $jobcontract = [];
        $joblocation = [];
        $jobacceptby = [];
        foreach ($jobs as $onejob)
        {
            $jobtitles[] = $onejob[1];
            $jobposition[] = $onejob[4];
            $jobcontract[]  = $onejob[5];
            $joblocation[] = $onejob[6];
            $jobacceptby[] = $onejob[9];

        } */

        
        




        $jobi = 0;
        $jobdates = [];
        while ($jobi < count($jobs))    
        {   
            $jobwithdate = [];
            $jobwithdate[0] = $jobi;
            
            $dateObject = DateTime::createFromFormat('d-m-Y', $jobs[$jobi][3]);
            $today = new DateTime();
            $interval = $today->diff($dateObject);
            $daysDifference = $interval->days;
            $jobwithdate[1] = $daysDifference;
            $jobdates[] = $jobwithdate;
            $jobi++;
        }
        
        
        usort($jobdates, function($a,$b){
            if ($a[1] == $b[1]) {
                return 0;
            }
            return ($a[1] < $b[1]) ? -1 : 1;
        });
        
        $newjobs = [];
        for( $i = 0; $i < count($jobdates); $i++ )
        {
            $newjobs[] = $jobs[$jobdates[$i][0]];
        }
        
        
        
        echo "<h1 id=\"jobheading\">Search results</h1>";

        foreach ($newjobs as $onejob)
        {
            $onejob[10] = true;
            $onejob[11] = false;
            $onejob[12] = false;
            $onejob[13] = false;
            $onejob[14] = false;
            if (!empty($_POST["title"]))
            {
                $title = $_POST["title"];
                if (!fnmatch("*$title*", $onejob[1]))
                {
                    $onejob[10] = false;
                }
            }

            if (!isset($_POST["title"]))
            {
                $onejob[10] = false;
            }

            if (isset($_POST["position"]))
            {
                $position = $_POST["position"];
                foreach ($position as $oneposition)
                {
                    
                    if (fnmatch("*$oneposition*",$onejob[4]))
                    {
                        $onejob[11] = true;
                    }
                }
            }
            else
            {
                $onejob[11] = true;
            }

            if (isset($_POST["contract"]))
            {
                $contract = $_POST["contract"];
                foreach ($contract as $onecontract)
                {
                    if (fnmatch("*$onecontract*",$onejob[5]))
                    {
                        $onejob[12] = true;
                    }
                }
            }
            else
            {
                $onejob[12] = true;
            }


            if (isset($_POST["location"]))
            {
                $location = $_POST["location"];
                foreach ($location as $onelocation)
                {
                    if (fnmatch("*$onelocation*",$onejob[6]))
                    {
                        $onejob[13] = true;
                    }
                }
            }
            else
            {
                $onejob[13] = true;
            }

            if (isset($_POST["acceptby"]))
            {
                $acceptby = $_POST["acceptby"];
                foreach ($acceptby as $oneacceptby)
                {
                    
                    if (fnmatch("*$oneacceptby*",$onejob[9]))
                    {
                        $onejob[14] = true;
                    }
                }
            }
            else
            {
                $onejob[14] = true;
            }

            if ($onejob[10]&&$onejob[11]&&$onejob[12]&&$onejob[13]&&$onejob[14])
            {
                echo "<section class=\"job\">\n
                    <section class=\"jobsection\">\n
                    <h2 class=\"h2heading\">".$onejob[1]."</h2>\n";
                echo "<p>Description:<br><br> $onejob[2] </p><hr>\n";
                echo "<p>Closing Date:<br><br> $onejob[3] </p><hr>\n";
                echo "<p>Position:<br><br> $onejob[4] </p><hr>\n";
                echo "<p>Contract:<br><br> $onejob[5] </p><hr>\n";
                echo "<p>Location:<br><br> $onejob[6] </p><hr>\n";
                echo "<p>Contact email:<br><br> $onejob[7] </p><hr>\n";
                echo "<p>Contact phone number:<br><br> $onejob[8] </p><hr>\n";
                echo "<p>Accept application by:<br><br> $onejob[9] </p>\n";
                echo "</section></section>\n";
            }


            
        }
        
        
        if (!isset($_POST["title"]))
        {
            foreach ($jobs as $onejob)
            {
                echo "<section class=\"job\">\n
                    <section class=\"jobsection\">\n
                    <h2 class=\"h2heading\">".$onejob[1]."</h2>\n";
                echo "<p>Description:<br><br> $onejob[2] </p><hr>\n";
                echo "<p>Closing Date:<br><br> $onejob[3] </p><hr>\n";
                echo "<p>Position:<br><br> $onejob[4] </p><hr>\n";
                echo "<p>Contract:<br><br> $onejob[5] </p><hr>\n";
                echo "<p>Location:<br><br> $onejob[6] </p><hr>\n";
                echo "<p>Contact email:<br><br> $onejob[7] </p><hr>\n";
                echo "<p>Contact phone number:<br><br> $onejob[8] </p><hr>\n";
                echo "<p>Accept application by:<br><br> $onejob[9] </p>\n";
                echo "</section></section>\n";
            }
        }


        
        require_once("footer.inc");


        







    ?>






</body>