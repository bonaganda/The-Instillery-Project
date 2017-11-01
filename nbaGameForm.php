<!DOCTYPE html>
<html>
    <head>
        <title>NBA Scoring System</title>
        <!--W3SCHOOL CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!--MY OWN CSS -->
        <link rel="shortcut icon" href="https://theinstillery.com/wp-content/uploads/2016/08/favicon.ico" />
        <link rel="stylesheet" href="css/addGame.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <!--MY OWN BODY CSS -->
    <body style=" background-image: url(Images/websitebackground.jpg);  font-family: 'Exo';text-align: center; margin-top: 35px; color: white; font-size: 22px">

        <?php include 'navigationbar.php'; ?>
        <br>
        <!--Add NBA Game Logo-->
        <h1 class=""><small>NBA</small></h1>

        <!--Result-->
        <!--Error Or Success-->
        <div id="game" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #dd9933">
                        <h4 class="modal-title" style="color: black">Result</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!--Message Details-->
                        <div class="form-group">
                            <p style="color: black" id="error"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Add NBA Game Form-->
        <form method="POST" id="nbaform">
            Player 1
            <br>
            <input class=" btn w3-border" type="number" id="player1" name="player1" placeholder="Player ID"  required>
            <br><br>  
            <input class=" btn w3-border" type="number" id="p1score" name="p1score" placeholder="Player Score" required>
            <br><br>   

            Player 2
            <br>
            <input class=" btn w3-border" type="number" id ="player2" name="player2" placeholder="Player ID" required>
            <br><br>
            <input class=" btn w3-border" type="number" id="p2score" name="p2score" placeholder="Player Score" required>
            <br><br>    

            <input class="btn w3-button w3-black" type="submit" name ="addnba" id="addnba" value="Submit Result" style="font-size: 16px;">
        </form>
        <!--Add NBA Game Form End-->
        <br><br>
        <!--Modal Container-->
        <div class="w3-container">
            <!--Modal Page Button-->
            <button onclick="document.getElementById('id01').style.display='block'" class="btn w3-button w3-black">OPEN ID</button>
            <!--Modal Page-->
            <div id="id01" class="w3-modal">
                <!--Modal Content-->
                <div class="w3-modal-content w3-third " style="background-color:transparent">
                    <!--Modal Content Table-->
                    <div class="w3-container">
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <table id="customers">
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>ID</th>
                            </tr>
                            <?php
                            require 'Database.php';
                            $sql = "SELECT * FROM register ORDER BY FULLNAME ASC";
                            $result = mysqli_query($con, $sql);
                            $rank = 1;

                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                <td>{$row['FULLNAME']}</td>
                                <td>{$row['EMAIL']} </td>
                                <td>{$row['ID']}</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <!--Modal Content Table End-->
                </div>
                <!--Modal Content End-->
            </div>
            <!--Modal Page End-->
        </div>
        <!--Modal Container End-->

        <!--Own Style JavaScript -->
        <script src="js/addnba.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
</html>