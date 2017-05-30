<nav class="navigation">
    <ul id="nav">
        <a href="index.php"><img src="Images/inst.png" width="232" height="120" id="logo" /></a> 
        <li><a href="Home.php">TOURNAMENTS</a></li>
        <li class="dropdown" style="position: relative; top:">
            <div><a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">RANKINGS</a></div>
            <div class="dropdown-content" id="myDropdown">
                <a href="Ps4.php">WINS</a>
                <a href="PC.php">WIN-RATE</a>
                <a href="XboxOne.php">TROPHIES</a>
            </div>
        </li> 
        <li><a href="UserProfile.html">PROFILES</a></li>
        <li><a href="About.php">RULES</a></li>
        <li><a href="FAQ.php">F.A.Q</a></li>
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

