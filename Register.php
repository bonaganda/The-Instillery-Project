<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="CSS/registerStyle.css"/>
    </head>
    <body>
        <?php include './Navbar.php';?>
        <header> 
            <a href='index.php'><img src ="Images/InstilleryLogo.png" alt="logo" style="height: 19%; width: 24%"/></a>
        </header>
		
        <div id="login_wrapper">
            <p style="font-size: 22px">
                    <img src ="Images/SignUpIcon.png" alt="sUIcon" style="height: 20px; position: relative;">
                    Sign up with your email address
            </p>
            <div class="loginbox">
                <form method="POST" action="signUp.php">
                    <p>
                        <input type="text" name="fullname" placeholder="Full Name"><br><br>
                        <input type="text" name="username" placeholder="Username"><br><br>
                        <input type="password" name="password" placeholder="Password"><br><br>
                        <input type="email" name="email" placeholder="Email" ><br><br>
                        <input type="email" name="email" placeholder="Confirm Email">
                    </p>
                    <p style=" position: relative; right: 10%">
                        <img src ="Images/ClockIcon.png" alt="cIcon" style="height: 20px; position: relative;">
                        <i>Date of Birth:</i>
                    </p>
                    <p>
                        <input id="date" type="date" style="color: grey">
                    </p>
                    <p style= "position: relative; right: 11%;">
                        <img src ="Images/GenderIcon.png" alt="gIcon" style="height: 20px; position: relative;">
                        <i>Gender:</i>
                    </p>
                    <p style= "position: relative; right: 5%;">
                        <input type="radio" name="gender" value="male" style="width:3%; height: 15px; left: 10%">Male 
                        <input type="radio" name="gender" value="female" style="width:3%; height: 15px">Female
                    <p/>
                    <input id="button" type="submit" name="signup_btn" value="Register" style="font-size: 18px; background-color: lightblue; font-weight: bold; width: 22%">

                    <p style="font-size: 22px">
                        <img src ="Images/SignUpIcon.png" alt="sUIcon" style="height: 20px; position: relative;">
                        <i>Already have an account?</i>
                    </p>
                    <p>
                        <input type="button" name ="login" value="Login" class="loginbutton" id="btnLgn" 
                        style="font-size: 18px; background-color:lightgreen ;font-weight: bold; width: 22%"  onClick="document.location.href='Login.html'" />
                    </p>
                </form> 	
            </div>
        </div>
        
    </body>
</html>