<?php
  session_start();
  require './Database.php';

  header("Content-Type: image/jpeg");    

  // do some validation here to ensure id is safe

  $sql = "SELECT register.FULLNAME, register.IMAGE, gameData.NBA_SCORE FROM register inner join gameData on register.ID = gameData.ID WHERE NBA_SCORE = (select max(NBA_SCORE) from gameData)";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $path = $row['IMAGE'];//Maybe you need to change this if you only save an url in the database  
  echo file_get_contents($path);  

?>