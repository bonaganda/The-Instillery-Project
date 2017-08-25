
<link rel="stylesheet" type="text/css" href="CSS/navBar.css"/><nav class="navigation">
    <ul id="nav">
        <a href="index.php"><img src="Images/inst.png" width="232" height="120" id="logo" /></a> 
        <li><a href="">TOURNAMENTS</a></li>
        <li class="dropdown" style="position: relative; top:">
            <div><a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">RANKINGS</a></div>
            <div class="dropdown-content" id="myDropdown">
                <a href="">WINS</a>
                <a href="">WIN-RATE</a>
                <a href="">TROPHIES</a>
            </div>
        </li> 
        <li><a href="UserProfile.php">PROFILES</a></li>
        <li><a href="leaderboard.php">LEADERBOARD</a></li>
        <li><a href="Register.html">REGISTER</a></li>
        <?php if (isset($_SESSION['username'])) { ?>
            <li class="dropdown" style="position: relative; top:">
                <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()"><?php echo $_SESSION['username']; ?></a>
                <div class="dropdown-content">
                    <a href="#">My Favorites</a>
                    <div class="dropdown-content-sub">
                        <?php while ($counter != -1) { ?>
                            <a href="./Games/<?php echo $fave[$counter] ?>.php"><?php echo $fave[$counter] ?></a>
                            <?php
                            $counter--;
                        }
                        ?>`
                    </div>
                    <a href="Logout.php">Logout</a>
                </div>
            </li>
        <?php } else { ?>
            <li><a href="Login.html">LOGIN</a></li>
        <?php } ?>

    </ul>
</nav>

