<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">
</head>

<body>
    <section class="index-header">
        <?php
        require_once("header.inc");
        ?>

        <div class="welcome">
            <h1>Your Only Job Vacancy Posting System</h1>
            <p>Everything you need for finding a job is here (not really)</p>
            
        </div>


    </section>





    <section class="info">

        <h1>Student Information</h1>
        <div class="specificinfos">

            <div class="specificinfo"><span class="why1">Huy Bui</span><br><br>Student Name
            </div>

            <div class="specificinfo"><span class="why1">104788737</span><br><br>Student ID</div>

            <div class="specificinfo"><span class="why1">104788737@student.swin.edu.au</span><br><br>Student Email</div>


        </div>



    </section>














    












    
    <section class="functionalities">

        <h1>Website Functionalities</h1>
        <div class="divide">
            <div class="functionality-line"><span class="functionality"><a href="jobpostform.php">Posting a job</a></span><br><br>You can access the job-posting link via this or via the header</div>
            <div class="functionality-line"><span class="functionality"><a href="searchjobprocess.php">All jobs vacancies</a></span><br><br>All job listing can be accessed here or via the header</div>
            <div class="functionality-line"><span class="functionality"><a href="searchjobform.php">Search for a job</a></span><br><br>Job Search page can be accessed here or via header</div>
            
            
        </div>
    </section>

    
<br><br>
    

<?php
require_once("footer.inc");
?>

</body>

</html>