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
// $qry = "select * from register inner join gameData on register.ID = gameData.ID
//         inner join gamehistory on register.ID = gamehistory.P_ID1 || gamehistory.P_ID2
//         where register.EMAIL ='$uName' AND register.PASSWORD='$pWord'";


$res = mysqli_query($con,$qry);
$num_row = mysqli_num_rows($res);
$row=mysqli_fetch_assoc($res);


if( $num_row >= 1 ) {
    //Register Call Back Fields
    echo $row['FULLNAME'];
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['EMAIL'] = $row['EMAIL'];
    $_SESSION['FULLNAME'] = $row['FULLNAME'];
    $_SESSION['IMAGE'] = $row['IMAGE'];

    //Game Data Call Back Fields
    $_SESSION['NBA_SCORE'] = $row['NBA_SCORE'];
    $_SESSION['FIFA_SCORE'] = $row['FIFA_SCORE'];
    $_SESSION['POOL_SCORE'] = $row['POOL_SCORE'];
    $_SESSION['RANKPOINTS'] = $row['RANKPOINTS'];

    //Game History Call Back Fields
    // $_SESSION['P_ID1'] = $row['P_ID1'];
    // $_SESSION['P_ID2'] = $row['P_ID2'];
    // $_SESSION['P_SCORE1'] = $row['P_SCORE1'];
    // $_SESSION['P_SCORE2'] = $row['P_SCORE2'];
    // $_SESSION['GAME'] = $row['GAME'];
    // $_SESSION['ADD_DATE'] = $row['ADD_DATE'];
}
else {
    echo 'NO';
}
