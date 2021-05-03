<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>contact form</title>
    <?php
    $pageTitle = "CONTACT US";

    include_once ('includes/header.php');

    ?>
</head>
<p>
<body>




<!-- input fields for fname,lname,email,& comments-->
<div class="contact">

    <div class="inputs">
    <div class="container">
        <form action="/CF_Thanks.php">
            <label for="fname">First Name*:</label>
            <input type="text" id="fname" name="firstname">

            <label for="lname">Last Name*:</label>
            <input type="text" id="lname" name="lastname">

            <label for="email">Email*:</label>
            <input type="text" id="email" name="email">


            <label for="comments">Comments*:</label>
            <textarea id="comments" name="comments"  style="height:200px"></textarea>

            <input type="button" onclick="location.href='CF_Thanks.php';" value="Submit" >
        </form>
    </div>
    </div>


<div class="contact1">
    <!-- the text above our social media links  -->
    <p>  Got a question? We'd love to hear from you. Leave us a comment and we'll respond as soon as possible.<p><br>
        <br> Prefer other methods? Reach out to us on our social media pages for timely responses and updates on new products!
    </p>
</div>




<div class="contact2">
    <!-- links to our social media pages  -->
    <a href="https://www.facebook.com/Studio13Music"><img alt="Studio 13 FB" src="www/images/fb_logo.png" width="75" height="75"> </a> &emsp;
    &emsp; <a href="https://www.instagram.com/Studio13Muisc"><img alt="Studio 13 IG" src="www/images/IG_logo.png" width="75" height="75"> </a> &emsp;
    &emsp; <a href="https://www.Twitter.com/Studio13Music"><img alt="Studio 13 T" src="www/images/T_logo.png" width="75" height="75"> </a> &emsp;
    &emsp; <a href="https://www.linkedin.com/company/Studio13Music"><img alt="Studio 13 LI" src="www/images/LI_logo.png" width="75" height="75"> </a> &emsp;
</div>
</div>

</body>
</p>
</html>
<?php
include 'includes/footer.php'
?>