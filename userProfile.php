<!DOCTYPE html>
<html>

    <head>
        <title>User Profile</title>
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
        <link rel="stylesheet" href="css/addGame.css">
    </head>


   <!--MY OWN BODY CSS -->
    <body style="background-image: url(Images/websitebackground.jpg);  font-family: 'Exo';
                text-align: center; color: white; font-size: 22px">

    <?php
    require 'Database.php';
    session_start();
    $user = $_SESSION['EMAIL'];

    include 'navigationbar.php';?>
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
                <h3 style="color:#dd9933">Game History</h3>
                <hr class='line'>
            </div>
            <div class="w3-container">
                <button class="btn" data-toggle="modal" data-target="#nbaGameH">NBA Game Histoy</button>
                <hr class='line'>
                <div id="nbaGameH" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <!-- Modal header-->
                      <div class="modal-header" style="background-color: #dd9933; font-family: 'Exo'">
                          <h4 class="modal-title" style="color: black">NBA GAME HISTORY</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                      <span style="font-size: 13.5pt; font-family: 'Georgia', serif; color:#dd9933" >
                      <?php
                      //--------------------------------------------------------------------------
                      // 2) Query database for data
                      //--------------------------------------------------------------------------
                      $qry = "SELECT g.GAME, r.FULLNAME AS P1Name, g.P_SCORE1,
                              s.FULLNAME as P2Name, g.P_SCORE2, g.ADD_DATE
                              FROM ((gamehistory AS g
                              INNER JOIN register AS r ON r.ID = g.P_ID1)
                              INNER JOIN register AS s ON s.ID = g.P_ID2)
                              WHERE g.GAME = 'NBA'
                              AND (r.EMAIL = '$user' OR s.EMAIL = '$user');";
                      $result = mysqli_query($con, $qry);          //query
                      if($result){
                        while($array = mysqli_fetch_assoc($result)){
                          $data['result'] = $array;
                          if($array['P_SCORE1'] > $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:green'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:red'>
                                <td>{$array['P2Name']} </td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <br>
                                <td>Result: {$array['P1Name']} Win</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                </tr>
                                  ";
                          }
                          if($array['P_SCORE1'] < $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:green'>
                                <td>{$array['P2Name']}</td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:red'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <br>
                                <td>Result: {$array['P2Name']} Win</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                <span>
                                </tr>
                                  ";
                          }
                          if($array['P_SCORE1'] == $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:#dd9933'>
                                <td>{$array['P2Name']}</td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:#dd9933'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <br>
                                <td>Result: Draw</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                <span>
                                </tr>
                                  ";
                          }


                        }
                      }
                      else{
                          echo 'false';
                      }
                      ?>
                      </span>
                        </div>
                      </div>
                    </div>
                </div>
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
                <h3 style="color:#dd9933">Game History</h3>
                <hr class='line'>
            </div>
            <div class="w3-container">
                <button class="btn" data-toggle="modal" data-target="#fifaGameH">FIFA Game Histoy</button>
                <hr class='line'>
                <div id="fifaGameH" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <!-- Modal header-->
                      <div class="modal-header" style="background-color: #dd9933; font-family: 'Exo'">
                          <h4 class="modal-title" style="color: black">FIFA GAME HISTORY</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                      <span style="font-size: 13.5pt; font-family: 'Georgia', serif; color:#dd9933" >
                      <?php
                      //--------------------------------------------------------------------------
                      // 2) Query database for data
                      //--------------------------------------------------------------------------
                      $qry = "SELECT g.GAME, r.FULLNAME AS P1Name, g.P_SCORE1,
                              s.FULLNAME as P2Name, g.P_SCORE2, g.ADD_DATE
                              FROM ((gamehistory AS g
                              INNER JOIN register AS r ON r.ID = g.P_ID1)
                              INNER JOIN register AS s ON s.ID = g.P_ID2)
                              WHERE g.GAME = 'FIFA'
                              AND (r.EMAIL = '$user' OR s.EMAIL = '$user');";
                      $result = mysqli_query($con, $qry);          //query
                      if($result){
                        while($array = mysqli_fetch_assoc($result)){
                          $data['result'] = $array;
                          if($array['P_SCORE1'] > $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:green'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:red'>
                                <td>{$array['P2Name']} </td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <br>
                                <td>Result: {$array['P1Name']} Win</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                </tr>
                                  ";
                          }
                          if($array['P_SCORE1'] < $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:green'>
                                <td>{$array['P2Name']}</td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:red'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <br>
                                <td>Result: {$array['P2Name']} Win</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                <span>
                                </tr>
                                  ";
                          }
                          if($array['P_SCORE1'] == $array['P_SCORE2'])
                          {
                            echo "
                                <tr>
                                <span style='color:#dd9933'>
                                <td>{$array['P2Name']}</td>
                                <td>{$array['P_SCORE2']}</td>
                                </span>
                                <td>VS</td>
                                <span style='color:#dd9933'>
                                <td>{$array['P1Name']} </td>
                                <td>{$array['P_SCORE1']}</td>
                                </span>
                                <br>
                                <td>Result: Draw</td>
                                <br>
                                <td>{$array['ADD_DATE']}</td>
                                <br>
                                <br>
                                <span>
                                </tr>
                                  ";
                          }


                        }
                      }
                      else{
                          echo 'false';
                      }
                      ?>
                      </span>
                        </div>
                      </div>
                    </div>
                </div>
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
                <h3 style="color:#dd9933">Game History</h3>
                <hr class='line'>
            </div>
            <div class="w3-container">
                <button class="btn" data-toggle="modal" data-target="#poolGameH">POOL Game Histoy</button>
                <hr class='line'>
                <div id="poolGameH" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <!-- Modal header-->
                      <div class="modal-header" style="background-color: #dd9933; font-family: 'Exo'">
                          <h4 class="modal-title" style="color: black">POOL GAME HISTORY</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                          <span style="font-size: 13.5pt; font-family: 'Georgia', serif; color:#dd9933" >
                            <?php
                            //--------------------------------------------------------------------------
                            // 2) Query database for data
                            //--------------------------------------------------------------------------
                            $qry = "SELECT g.GAME, r.FULLNAME AS P1Name, g.P_SCORE1,
                                    s.FULLNAME as P2Name, g.P_SCORE2, g.ADD_DATE
                                    FROM ((gamehistory AS g
                                    INNER JOIN register AS r ON r.ID = g.P_ID1)
                                    INNER JOIN register AS s ON s.ID = g.P_ID2)
                                    WHERE g.GAME = 'POOL'
                                    AND (r.EMAIL = '$user' OR s.EMAIL = '$user');";
                            $result = mysqli_query($con, $qry);          //query
                            if($result){
                              while($array = mysqli_fetch_assoc($result)){
                                $data['result'] = $array;
                                if($array['P_SCORE1'] > $array['P_SCORE2'])
                                {
                                  echo "
                                      <tr>
                                      <span style='color:green'>
                                      <td>{$array['P1Name']} </td>
                                      <td>{$array['P_SCORE1']}</td>
                                      </span>
                                      <td>VS</td>
                                      <span style='color:red'>
                                      <td>{$array['P2Name']} </td>
                                      <td>{$array['P_SCORE2']}</td>
                                      </span>
                                      <br>
                                      <td>Result: {$array['P1Name']} Win</td>
                                      <br>
                                      <td>{$array['ADD_DATE']}</td>
                                      <br>
                                      <br>
                                      </tr>
                                        ";
                                }
                                if($array['P_SCORE1'] < $array['P_SCORE2'])
                                {
                                  echo "
                                      <tr>
                                      <span style='color:green'>
                                      <td>{$array['P2Name']}</td>
                                      <td>{$array['P_SCORE2']}</td>
                                      </span>
                                      <td>VS</td>
                                      <span style='color:red'>
                                      <td>{$array['P1Name']} </td>
                                      <td>{$array['P_SCORE1']}</td>
                                      </span>
                                      <br>
                                      <td>Result: {$array['P2Name']} Win</td>
                                      <br>
                                      <td>{$array['ADD_DATE']}</td>
                                      <br>
                                      <br>
                                      <span>
                                      </tr>
                                        ";
                                }
                                if($array['P_SCORE1'] == $array['P_SCORE2'])
                                {
                                  echo "
                                      <tr>
                                      <span style='color:#dd9933'>
                                      <td>{$array['P2Name']}</td>
                                      <td>{$array['P_SCORE2']}</td>
                                      </span>
                                      <td>VS</td>
                                      <span style='color:#dd9933'>
                                      <td>{$array['P1Name']} </td>
                                      <td>{$array['P_SCORE1']}</td>
                                      </span>
                                      <br>
                                      <td>Result: Draw</td>
                                      <br>
                                      <td>{$array['ADD_DATE']}</td>
                                      <br>
                                      <br>
                                      <span>
                                      </tr>
                                        ";
                                }


                              }
                            }
                            else{
                                echo 'false';
                            }
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
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
