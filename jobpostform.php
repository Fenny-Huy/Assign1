<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="HuyBui">
    <link href="styles/styles.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/logo_only.png">
    <title>Job Application Form</title>



</head>

<body>
    <section class="header">
    <?php
    require_once("header.inc");
    ?>
    </section>


    <div id="oneform">

        <div class="thewholeform">
            <h1>Job Application Form</h1>

            <div class="applicationform">
                <form action="postjobprocess.php" method="post">


                    <div class="onefield">
                        <label for="positionID">Postition ID:</label>
                        <input type="text" id="positionID" name="positionid" maxlength="5" pattern="ID\d{3}"
                            required><br><br>
                    </div>




                    <div class="onefield">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" maxlength="10" pattern="[A-Za-z\s]{1,10}"
                            required><br><br>
                    </div>


                    
                    <div class="onefield">

                        <label for="desc">Description:</label>
                        <input type="text" id="desc" name="description" maxlength="250" required><br><br>
                    </div>



                    <div class="onefield">
                        <label for="cdate">Closing date:</label>
                        <input type="text" id="cdate" name="closingdate" required="required" placeholder="dd/mm/yyyy"
                            pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/\d{4}"><br><br>
                    </div>





                    <div class="onefield">


                        


                        <fieldset>
                            <legend>Position</legend>
                            <div class="selection">

                                <label for="fulltime">Full Time</label>
                                <input type="radio" id="fulltime" name="position" value="Full-Time" required>
                            </div>

                            <div class="selection">

                                <label for="parttime">Part Time</label>
                                <input type="radio" id="parttime" name="position" value="Part-Time" required>
                            </div>


                            
                        </fieldset><br>







                    </div>


                    <div class="onefield">


                        


                        <fieldset>
                            <legend>Contract</legend>
                            <div class="selection">

                                <label for="ongoing">On Going</label>
                                <input type="radio" id="ongoing" name="contract" value="On Going" required>
                            </div>

                            <div class="selection">

                                <label for="fixedterm">Fixed Term</label>
                                <input type="radio" id="fixedterm" name="contract" value="Fixed Term" required>
                            </div>


                            
                        </fieldset><br>







                    </div>







                    <div class="onefield">


                        


                        <fieldset>
                            <legend>Location</legend>
                            <div class="selection">

                                <label for="onsite">On Site</label>
                                <input type="radio" id="onsite" name="location" value="On Site" required>
                            </div>

                            <div class="selection">

                                <label for="remote">Remote</label>
                                <input type="radio" id="remote" name="location" value="Remote" required>
                            </div>


                            
                        </fieldset><br>







                    </div>








                    




                    



                    

                    





                    <div class="onefield">
                        <label for="email">Contact Email Address:</label>
                        <input type="email" id="email" name="email" required><br><br>
                    </div>




                    <div class="onefield">
                        <label for="phone">Contact Phone Number:</label>
                        <input type="text" id="phone" name="phone" pattern="[0-9\s]{8,12}" required><br><br>
                    </div>





                    <div class="applicator1">
                        <label for="optionlist"> Accept application by:</label><br>
                        <div class="optionlist">
                            <div>

                                <input type="checkbox" id="post" name="acceptby[]" value="Post">
                                <label for="post">Post</label>
                            </div>


                            <div>
                                <input type="checkbox" id="mail" name="acceptby[]" value="Mail">
                                <label for="mail">Mail</label>
                            </div>

                            
                            
                            
                            
                        </div>
                        


                    </div>
                    <div class = "Iagree">
                        <label><input type="checkbox" name="agree" value="check" required="required">
                            I agree to the terms and conditions
                        </label>
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