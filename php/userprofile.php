<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 9/7/17
 * Time: 1:19 PM
 */

//--------------------------------------------------------------------------
// 1) Connect to mysql database
//--------------------------------------------------------------------------
require 'Database.php';
session_start();
//$using = $_SESSION['EMAIL'];
//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------
$qry = 'select * from register';
$result = mysqli_query($con, $qry);          //query
$array = mysqli_fetch_row($result);          //fetch result

//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

//echo json_encode($array);
if($result){
    $value = array($_SESSION['ID'], $_SESSION['EMAIL'], $_SESSION['FULLNAME'], $_SESSION['IMAGE'], $_SESSION['NBA_SCORE'], $_SESSION['FIFA_SCORE'], $_SESSION['POOL_SCORE']);
    echo json_encode($value);
    }
    else{
        echo 'false';
    }
