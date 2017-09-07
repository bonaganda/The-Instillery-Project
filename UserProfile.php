<!DOCTYPE html>
<html>
<title>User Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/userProfileStyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php include 'Navigationbar.php';?>
<body class="w3-black">
<br/>
<div class="w3-content w3-margin-top" style="max-width:450px;">
<!--	 <img src="Images/logo.png" style="width:100%">--><br/><br/><br/><br/><br/><br/><br/>
</div>
<br/>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:800px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-half">
    
      <div class="w3-black w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="Images/john.jpeg" style="width:100%" alt="Avatar" id="imageUser">
          <div class="w3-display-bottomleft w3-container w3-text-white">
            <h2 id="fullname">John Barraca</h2>
          </div>
        </div>
        <div class="w3-container">
          <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-jd" id='email'></i >
          <hr>
        </div>
          <div class="w3-container">
              <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-jd" id='iduser'></i >
              <hr>
          </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-half">
    
      <div class="w3-container w3-card-2 w3-jd w3-margin-bottom">
        <h2 class="w3-jd w3-padding-16"><i class="fa fa-trophy fa-fw w3-margin-right w3-xxlarge w3-jd"></i>NBASCORE!</h2>
        <div class="w3-container">
          	<div class="w3-black">
            	<div id='nbaScore'>0</div>
          	</div>
          <hr class="hra">
        </div>
     </div>

      <div class="w3-container w3-card-2 w3-jd w3-margin-bottom">
        <h2 class="w3-jd w3-padding-16"><i class="fa fa-info-circle fa-fw w3-margin-right w3-xxlarge w3-jd"></i>FIFA_SCORE</h2>
        <div class="w3-container">
       		<div class="w3-black">
              <div id='fifaScore'>0</div>
            </div>
          <hr class="hra">
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-jd  w3-margin-bottom">
        <h2 class="w3-jd w3-padding-16"><i class="fa fa-handshake-o fa-fw w3-margin-right w3-xxlarge w3-jd "></i>POOL_SCORE</h2>
        <div class="w3-container">
       		<div class="w3-black">
              <div id='poolScore'>0</div>
            </div>
          <hr class="hra">
        </div>
      </div>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-jd w3-center w3-margin-top">
  <p>MY Social Media.</p>
  <a href="https://www.facebook.com/jdbarraca"><i class="fa fa-facebook-official w3-xlarge w3-hover-opacity"></i></a>
  <a href="https://www.instagram.com/jdfruitjam/"><i class="fa fa-instagram w3-xlarge w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/in/john-barraca-13b948142/"><i class="fa fa-linkedin w3-xlarge w3-hover-opacity"></i></a>
</footer>

    <!--Own Script-->
<script src="js/jquery.js"></script>
<script src="js/profile.js  "></script>


</body>
</html>
