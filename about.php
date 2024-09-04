<!doctype html>
<html lang="en">


<head>
    <title>About</title>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">


</head>



<body>
    <section class="header">
    <?php
    require_once("header.inc");
    ?>
    </section>
    
    
    <?php
    $phpversion = phpversion();
    echo "<div class = \"aboutme\">Req1: \nThe version of PHP installed on mercury server is $phpversion</div><br>";
    echo "<div class = \"aboutme\">For this assignment, I believe I have attempted all the tasks given in the requirement</div><br>"

    ?>

    <div class = "aboutme">
        For this assignment, I believe I have attempted all the tasks given in the assignment. For the home page, my name, student ID, email address has been provided in the body, similarly the link to job posting form, job searching form, about page in the header and footer, as well as the statement in the footer
        The job posting page also implements the necessary input requirements. For example, the PositionID needs to follow the pattern of ID and 3 numbers, and if the ID is already taken, that job post will not be recorded to the save file. Or the title can not exceed 10 characters.
        For processing the job post, it will check if every fields have been filled and check the PositionID, if all required fields are filled and the positionID does not match any in the save file, then it will provide the user a message notifying that it has successfully been saved. Otherwise, there will be an error message. And the records saved in the file also follow the requirement, each record seperated by a line break, and each field in one record is seperated by a tab
        For search form, I also improve it to also search for jobs based on not only the title, but also the position, contract, location and accept application by. If one field is missing, then it is considered to accept all options for that field. 
        The search job process will also return the results based on the criteria chosen in the search form. And the result is also sorted based on the closest closing date to today's date. This is achieved by calculating the number of days between the close date and today's date and sort. 
        
        Most of the presumably special features that I implemented are mostly UI/UX related, specifically, when you hover the mouse over the navigation bar option in the header, the student information section and the useful links in the footer, there will be some speical effects. I also implement
    </div>
    <br>

    <?php
    require_once("footer.inc");
    ?>






</body>