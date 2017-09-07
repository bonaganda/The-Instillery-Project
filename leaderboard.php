<!DOCTYPE html>
<?php
session_start();
require './Database.php';
?>
<html>
<title>User Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/userProfileStyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include 'Navigationbar.php';
?>    
<body style="background: url(Images/nbawallpaper.jpg)">
<br/>
<div class="w3-content w3-margin-top" style="max-width:450px;">
    
<!--	 <img src="Images/logo.png" style="width:100%">--><br/><br/><br/><br/><br/><br/><br/>
</div>
<br/>

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1080px;">
    <h1>NBA 2k18 Leaderboards</h1>

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->

    <div class="w3-half">
        <div class="w3-half">
            
    <!-- Number 1 in leader board - Image and Profile -->
      <div style="background: url(Images/black.jpg)">
          <div class="w3-text-grey w3-card-4">
        <div class="w3-display-container">
            <center>
            <img src="Images/john.jpeg" class= "w3-circle" style=" position: absolute; bottom:-20%; left:35.5%; width:30%" alt="Avatar"><br><br><br><br>
            </center>
            
          <div class="w3-display-bottommiddle w3-container w3-text-gold" style="position: absolute; top:120%; left:50%;">
            
              <!-- For name, needs to get from the database below -->
              
              <h2>John</h2>           
          </div>
        </div>
        <div class="w3-container">
            <!-- Number 1 in leader board - Score - Needs to retrieve score and other information from the database -->
          <br><br><br><br><br><br><br><p><i class="fa fa-trophy fa-fw w3-margin-right w3-large w3-text-jd"></i>Rank number: Rank 1</p>
          <?php
          $sql = "SELECT score, name FROM DUMMYTABLE WHERE score = (select max(score) from DUMMYTABLE)";
          $result = mysqli_query($con, $sql);
          
          $row = mysqli_fetch_assoc($result);
          echo "
          <p>Total Score: {$row['score']}</p>
          <p>Profile page: {$row['name']}</p>
          <p>Rating: A+</p>";
          
              ?>
          <br><br><br><br>
          <hr>
        </div>
          </div>
      </div><br>
      </div>
    <!-- End Left Column -->
    </div>
    <div class = "w3-rest w3-container w3-black"></div>
    
    <!-- Right Column -->
    <div class="w3-half">
    
      <div class="w3-container w3-card-2 w3-jd w3-margin-bottom">
          <br>
        <table class="w3-table-all" style="position:relative;">
    <thead>
      <tr class=" w3-orange">
        <th>Rank</th>
        <th>Name</th>
        <th>Points</th>
        <th>Rating</th>
      </tr>
    </thead>

    <?php
    
    
        $sql = "SELECT name, score FROM DUMMYTABLE ORDER BY score DESC";
        $result = mysqli_query($con, $sql);
        $rank = 1;

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
            <td>{$rank}</td>
            <td>{$row['name']} </td>
            <td>{$row['score']}</td>
            <td> </td>
                </tr>";
                $rank++;
            }
        }
    ?>
  </table>
        <div class="w3-container">
          	<div class="w3-black w3-round-xlarge w3-small">
            	
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
  
<br>
<br>
<br>
<br>
<footer class="w3-container w3-jd w3-center w3-margin-top">
  <p>The Instillery Social Media</p>
  <a href="https://www.facebook.com/theinstillery"><i class="fa fa-facebook-official w3-xlarge w3-hover-opacity"></i></a>
  <a href="https://www.twitter.com/theinstillery/"><i class="fa fa-twitter w3-xlarge w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/company/the-instillery"><i class="fa fa-linkedin w3-xlarge w3-hover-opacity"></i></a>
</footer>

</body>
</html>
