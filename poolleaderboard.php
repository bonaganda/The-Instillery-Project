<?php
session_start();
require './Database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pool Leaderboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="shortcut icon" href="https://theinstillery.com/wp-content/uploads/2016/08/favicon.ico" />
        <style>
            #customers   {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px #ddd;
                padding: 8px;
               /* background-color: transparent;*/
                color:white;
            }


            /*#customers tr:hover {background-color: #dd9933;}*/
            #customers tr:nth-child(even){background-color: transparent;}
            #customers tr:nth-child(odd){background-color: transparent;}
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color:#FF8C00;
                color: black;
            }
        </style>
    </head>
    <!--MY OWN BODY CSS -->
    <body style=" background-image: url(Images/websitebackground.jpg); font-family: 'Exo','sans-serif'; text-align: center; color: white; font-size: 22px">
        <?php include 'navigationbar.php'; ?>
        <br><br><br>
        <div class="w3-content w3-margin-top" style="max-width:450px;"></div>
        <br>
        <!-- Page Container -->
        <div class="w3-content w3-margin-top" style="max-width:1080px;">


          <!-- The Grid -->
          <div class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-half">
                <div class="w3-half">
                <!-- Number 1 in leader board - Image and Profile -->
                    <div style="background-color: transparent;">
                        <div class="w3-text-white w3-card-4">
                            <div class="w3-display-container">
                                <center>
                                <img src="getImagePool.php" class= "w3-circle" style=" position: absolute; bottom:-20%; left:35.5%; width:30%" alt=""><br><br><br><br>
                                </center>
                                 <div class="w3-display-bottommiddle w3-container w3-text-gold" style="position: absolute; top:120%; left:50%;">
                                     <!-- For name, needs to get from the database below -->
                                     <br>
                                     <h2>Rank 1</h2>
                                 </div>
                             </div>
                             <div class="w3-container">
                                <!-- Number 1 in leader board - Score - Needs to retrieve score and other information from the database -->
                              <br><br><br><br>
                              <?php
                              $sql = "SELECT register.FULLNAME, gameData.POOL_SCORE, gameData.RANKPOINTS FROM register inner join gameData on register.ID = gameData.ID WHERE POOL_SCORE = (select max(POOL_SCORE) from gameData)";
                              $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if($row['RANKPOINTS'] < 300) 
                                { 
                                  $rating = 'Bronze'; 
                                } else if($row['RANKPOINTS'] >= 300 && $row['RANKPOINTS'] < 500) 
                                { 
                                  $rating = 'Silver'; 
                                } else if($row['RANKPOINTS'] >= 500 && $row['RANKPOINTS'] < 700) 
                                { 
                                  $rating = 'Gold'; 
                                } else if($row['RANKPOINTS'] >= 700 && $row['RANKPOINTS'] < 1001) 
                                { 
                                  $rating = 'Platinum'; 
                                }
                                if($row['POOL_SCORE'] >0) {
                                  echo "
                                  <p>Name: {$row['FULLNAME']}</p>
                                  <p>Total Score: {$row['POOL_SCORE']}</p>
                                  <p>Rating: {$rating}</p>";  
                                }
                                      
                                 ?>

                                  <br><br><br><br>
                                  <hr>
                            </div>
                         </div>
                    </div>
                    <br>
                </div>
            <!-- End Left Column -->
            </div>
            <div class = "w3-rest w3-container w3-black"></div>
            <!-- Right Column -->
            <div class="w3-half">
              <div class="w3-container w3-card-2 w3-jd w3-margin-bottom">
                  <br>
<!--                <table class="w3-table-all" style="position:relative;">-->
                  <table id="customers">
                    <thead>
                      <tr class=" w3-orange">
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = "SELECT register.FULLNAME,  gameData.POOL_SCORE, gameData.RANKPOINTS
                    FROM register inner join gameData on register.ID = gameData.ID ORDER BY gameData.POOL_SCORE DESC";
                    $result = mysqli_query($con, $sql);
                    $rank = 1;
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($row['RANKPOINTS'] < 300) 
                              { 
                                $rating = 'Bronze'; 
                              } else if($row['RANKPOINTS'] >= 300 && $row['RANKPOINTS'] < 500) 
                              { 
                                $rating = 'Silver'; 
                              } else if($row['RANKPOINTS'] >= 500 && $row['RANKPOINTS'] < 700) 
                              { 
                                $rating = 'Gold'; 
                              } else if($row['RANKPOINTS'] >= 700 && $row['RANKPOINTS'] < 1001) 
                              { 
                                $rating = 'Platinum'; 
                              }
                              if($row['POOL_SCORE'] > 0)
                              {
                              echo "<tr>
                  <td>{$rank}</td>
                  <td>{$row['FULLNAME']} </td>
                  <td>{$row['POOL_SCORE']}</td>
                  <td>{$rating}</td>
                  
                      </tr>";
                              }
                            
                            $rank++;
                        }
                    }
                    ?>
                 </table>
                <div class="w3-container">
                    <div class="w3-black w3-round-xlarge w3-small"></div>
                  <hr class="hra">
                </div>
             </div>
            <!-- End Right Column -->
            </div>
          <!-- End Grid -->
          </div>
          <!-- End Page Container -->
        </div>

         <!-- Footer -->
        <footer class="w3-container w3-center w3-margin-top w3-text-white">
            <p>The Instillery Social Media</p>
            <a href="https://www.facebook.com/theinstillery"><i class="fa fa-facebook-official w3-xlarge w3-hover-opacity" style="color:#dd9933"></i></a>
            <a href="https://www.twitter.com/theinstillery/"><i class="fa fa-twitter w3-xlarge w3-hover-opacity"  style="color:#dd9933"></i></a>
            <a href="https://www.linkedin.com/company/the-instillery"><i class="fa fa-linkedin w3-xlarge w3-hover-opacity" style="color:#dd9933"></i></a>
        </footer>
        <!-- Footer End-->


    </body>
</html>
