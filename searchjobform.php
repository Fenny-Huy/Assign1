<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">
    <title>Search Form</title>



</head>

<body>
    <section class="header">
    <?php
    require_once("header.inc");
    ?>
    </section>


    <div id="oneform">

        <div class="thewholeform">
            <h1>Job Filter Form</h1>

            <div class="applicationform">
                <form action="searchjobprocess.php" method="post">


                    




                    <div class="onefield">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" maxlength="10" pattern="[A-Za-z\s]{1,10}"><br><br>
                    </div>


                    
                    


                    <div class="applicator1">
                        <label for="optionlist" class="nocheck">Position:</label><br>
                        <div class="optionlist">
                            <div class="skillcheck">

                                <input type="checkbox" id="fulltime" name="position[]" value="Full-Time">
                                <label for="fulltime">Full Time</label>
                            </div>


                            <div class="skillcheck">
                                <input type="checkbox" id="parttime" name="position[]" value="Part-Time">
                                <label for="parttime">Part Time</label>
                            </div>

                            
                        </div>
                        
                    </div>
                    
                    <div class="applicator1">
                        <label for="optionlist" class="nocheck">Contract:</label><br>
                        <div class="optionlist">
                            <div class="skillcheck">

                                <input type="checkbox" id="ongoing" name="contract[]" value="On Going">
                                <label for="ongoing">On Going</label>
                            </div>


                            <div class="skillcheck">
                                <input type="checkbox" id="fixedterm" name="contract[]" value="Fixed Term">
                                <label for="fixedterm">Fixed Term</label>
                            </div>

                            
                        </div>
                        
                    </div>

                    <div class="applicator1">
                        <label for="optionlist" class="nocheck">Location:</label><br>
                        <div class="optionlist">
                            <div class="skillcheck">

                                <input type="checkbox" id="onsite" name="location[]" value="On Site">
                                <label for="onsite">On Site</label>
                            </div>


                            <div class="skillcheck">
                                <input type="checkbox" id="remote" name="location[]" value="Remote">
                                <label for="remote">Remote</label>
                            </div>

                            
                        </div>
                        
                    </div>


                    





                    <div class="applicator1">
                        <label for="optionlist" class="nocheck"> Accept application by:</label><br>
                        <div class="optionlist">
                            <div class="skillcheck">

                                <input type="checkbox" id="post" name="acceptby[]" value="Post">
                                <label for="post">Post</label>
                            </div>


                            <div class="skillcheck">
                                <input type="checkbox" id="post" name="acceptby[]" value="Mail">
                                <label for="post">Mail</label>
                            </div>

                            
                        </div>
                        
                    </div>

                    
                    <br>
                    <input type="submit" value="Apply" id="finalapply">
                </form>
            </div>
        </div>
    </div>

   
    <?php
    require_once("footer.inc");
    ?>









</body>

</html>