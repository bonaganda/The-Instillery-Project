<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 9/6/17
 * Time: 11:07 PM
 */
require_once 'Database.php';

session_start();
$uName = $_POST['name'];

$pWord = ($_POST['pwd']);

$qry = "select * from register inner join gameData on register.ID = gameData.ID where register.EMAIL ='$uName' AND register.PASSWORD='$pWord'";


$res = mysqli_query($con,$qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);

if( $num_row == 1 ) {
    echo $row['FULLNAME'];
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['EMAIL'] = $row['EMAIL'];
    $_SESSION['FULLNAME'] = $row['FULLNAME'];
    $_SESSION['IMAGE'] = $row['IMAGE'];
    $_SESSION['NBA_SCORE'] = $row['NBA_SCORE'];
    $_SESSION['FIFA_SCORE'] = $row['FIFA_SCORE'];
    $_SESSION['POOL_SCORE'] = $row['POOL_SCORE'];
    $_SESSION['NBA_WINS'] = $row['NBA_WINS'];
    $_SESSION['FIFA_WINS'] = $row['FIFA_WINS'];
    $_SESSION['POOL_WINS'] = $row['POOL_WINS'];
    $_SESSION['NBA_LOSS'] = $row['NBA_LOSS'];
    $_SESSION['FIFA_LOSS'] = $row['FIFA_LOSS'];
    $_SESSION['POOL_LOSS'] = $row['POOL_LOSS'];
    $_SESSION['RANKPOINTS'] = $row['RANKPOINTS'];
}
else {
    echo 'NO';
}