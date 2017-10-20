<!DOCTYPE html>
<html>

    <head>
        <title>User Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--User Profile CSS-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="shortcut icon" href="https://theinstillery.com/wp-content/uploads/2016/08/favicon.ico" />
        <style>
            .line {
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid #ccc;
                margin: 1em 0;
                padding: 0; 
                border-color: #dd9933;
            }
        </style>
    </head>


   <!--MY OWN BODY CSS -->
    <body style="background-image: url(Images/websitebackground.jpg);  font-family: 'Exo'; 
                text-align: center; color: white; font-size: 22px">
    <?php include 'navigationbar.php';?>
    <br><br><br><br>
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:800px;">

      <!-- The Grid -->
      <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-half">
            <div class="w3-text-grey w3-card-4" style="transparent">
                 <!-- Left Column Card -->
                <div class="w3-display-container">
                  <!--Image-->
                  <img src="" style="width:65%" alt="Avatar" id="imageUser">
                    <!-- Full Name -->
                    <div class="w3-display-bottom w3-container">
                        <hr class='line'>
                        <h2 id="fullname" style="color:#dd9933"></h2>
                        <hr class='line'>
                    </div>
                </div>
                <!-- Email -->
                <div class="w3-container">
                    <i class="fa fa-envelope fa-fw w3-medium" style="padding-right: 150px; color:#dd9933"><em id='email'>email</em></i >
                    <hr class='line'>
                </div>
                <!-- User Id -->
                <div class="w3-container">
                    <i class="fa fa-id-card fa-fw w3-medium" style="padding-right: 150px; color:#dd9933"><em style="color:#dd9933" id='iduser'>iduser</em></i >
                    <hr class='line'>
                </div>
            </div>
            <br>
        </div>
        <!-- End Left Column -->

        <!-- Right Column -->
        <div class="w3-half">
            
            <!-- GAME Column -->
            <div class="w3-text-grey w3-card-4" style="transparent">

            <!-- NBA Column -->
            <div class="w3-display-container">
              <img src="Images/nbacardus.jpg" style="width:100%" alt="Avatar">
            </div>
            <div class="w3-container">
                <hr class='line'>
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933">Score: <span id='nbaScore'></span></i >
                <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='nbaWins'></span></i >
                <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='nbaLoss'></span></i >
                <hr class='line'>
            </div>
            <br>

            <!-- FIFA Column -->
             <div class="w3-display-container">
              <img src="Images/fifacardus.jpg" style="width:100%" alt="Avatar" id="imageUser">
            </div>
            <div class="w3-container">
                <hr class='line'>
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933">Score: <span id='fifaScore'></span></i >
                <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='fifaWins'></span></i >
                <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='fifaLoss'></span></i >
                <hr class='line'>
            </div>
            <br>

             
            <!-- POOL Column -->
             <div class="w3-display-container">
              <img src="Images/poolcardus.jpg" style="width:100%" alt="Avatar">
            </div>
            <div class="w3-container">
                <hr class='line'>
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933">Score: <span id='poolScore'></span></i >
                <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='poolWins'></span></i >
               <hr class='line'>
            </div>
            <div class="w3-container">
                <i class="w3-medium" style="padding-right: 150px; color:#dd9933"><span style="color:#dd9933" id='poolLoss'></span></i >
                <hr class='line'>
            </div>
            <br>
          </div>
           <!-- Card Column End-->
        </div>
        <!-- Right Column End -->
      </div>
    <!-- End Grid -->
    </div>
    <!-- End Page Container -->

    <!-- Footer -->
    <footer class="w3-container w3-center w3-margin-top w3-text-white">
        <p>The Instillery Social Media</p>
        <a href="https://www.facebook.com/theinstillery"><i class="fa fa-facebook-official w3-xlarge w3-hover-opacity" style="color:#dd9933"></i></a>
        <a href="https://www.twitter.com/theinstillery/"><i class="fa fa-twitter w3-xlarge w3-hover-opacity"  style="color:#dd9933"></i></a>
        <a href="https://www.linkedin.com/company/the-instillery"><i class="fa fa-linkedin w3-xlarge w3-hover-opacity" style="color:#dd9933"></i></a>
    </footer>
    <!-- Footer End-->

    <!--Own Script-->
    <script src="js/profile.js  "></script>

    </body>
</html>
