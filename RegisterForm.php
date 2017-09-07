<?php
    require './RegisterProcess.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="CSS/registerStyle.css"/>
<!--        <script type="text/javascript" src="RegisterJScript.js"></script>-->
    </head>
    <body>
        <header> 
            <a href='index.html'><img src ="Images/InstilleryLogo.png" alt="logo" style="height: 19%; width: 24%; "/></a>
        </header>
        
        <img src ="Images/SignUpIcon.png" alt="sUIcon" style="height: 20px; position: relative; ">
        <i style="font-size: 22px"> Already have an account?</i><br><br>
        <input type="submit" name ="login" value="Login" class="loginbutton" id="btnLgn" 
        style="font-size: 18px; background-color: lightgreen; font-weight: bold; " onClick="document.location.href='index.html'" >
        <div>
            <form enctype="multipart/form-data" method="POST" action="RegisterForm.php">
                <p style="font-size: 22px">
                    <img src ="Images/SignUpIcon.png" alt="sUIcon" style="height: 20px; position: relative;">
                    Create Account using Email Address
                </p>

                <div class="alert alert-error"><?= $_SESSION['message']?></div><div class="alert alert-succ"><?= $_SESSION['success']?></div><br>
                <div class="avatar" style="margin-left: 4.5%"><label>Upload Photo: </label>
                <input type="file" name="image" accept="image/*" required></div>

                <input type="text" name="fullname" placeholder="Full Name" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="password" name="confirmPass" placeholder="Confirm Password" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="email" name="confirmEmail" placeholder="Confirm Email" required><br><br>


                <a style="position:relative; right: 8%">Enter League(Optional):</a><br><br>
                <input type="checkbox" name="fifaCheckbox" >FIFA
                <input type="checkbox" name="poolCheckbox">Pool
                <input type="checkbox" name="nbaCheckbox">NBA2k17<br><br>

                <input type="submit" name="register_btn" value="Register" style="font-size: 18px; background-color: lightgreen; font-weight: bold;">
            </form> 
        </div>
    </body>
</html>