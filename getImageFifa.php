<?php
  session_start();
  require './Database.php';

  header("Content-Type: image/jpeg");

  // do some validation here to ensure id is safe

  $sql = "SELECT register.FULLNAME, register.IMAGE, gameData.FIFA_SCORE FROM register inner join gameData on register.ID = gameData.ID WHERE FIFA_SCORE = (select max(FIFA_SCORE) from gameData)";

 /* $sql = "SELECT register.FULLNAME, register.IMAGE, gameData.NBA_SCORE FROM register inner join gameData on register.ID = gameData.ID ORDER BY gameData.NBA_SCORE DESC";*/


  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $path = $row['IMAGE'];//Maybe you need to change this if you only save an url in the database
  if($row['FIFA_SCORE'] > 0){
  	echo file_get_contents($path);
  }
?>
