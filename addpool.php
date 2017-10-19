<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 9/8/17
 * Time: 11:57 PM
 */
    require_once 'Database.php';

    session_start();
    $p1ID=$_POST['player1'];
    $p2ID=$_POST['player2'];
    $p1s=$_POST['p1score'];
    $p2s=$_POST['p2score'];
    //Rank Points
    $rankWin = 15;
    $rankLoss = 10;

    //WIN & LOSS
    $win = 1;
    $loss = 1;

    //query if player 1 exists
    $sql = "select * from gameData where ID ='$p1ID'";
    $res = mysqli_query($con, $sql);
    $num_row = mysqli_num_rows($res);

    //return false if player 1 exists
    if($num_row == 1)
    {
        //query if player 2 exists
        $sql2 = "select * from gameData where ID ='$p2ID'";
        $res2 = mysqli_query($con, $sql2);
        $num_row2 = mysqli_num_rows($res2);

        //return false if player 2 exist
        if($num_row2 == 1)
        {
            //update player 1 POOL score
            $sql3 = "update gameData set POOL_SCORE = POOL_SCORE + '$p1s' where ID = '$p1ID' ";

            mysqli_query($con, $sql3);
            $num_row3 = mysqli_affected_rows($con);
            

            //return false if player 1 score is not added
            if($num_row3 == 1)
            {
                    
                //update player 2 POOL score
                $sql4 = "update gameData set POOL_SCORE = POOL_SCORE + '$p2s' where ID = '$p2ID' ";

                mysqli_query($con, $sql4);
                $num_row4 = mysqli_affected_rows($con);
                

                //return false if player 2 score is not added
                if($num_row4 == 1)
                {   
                    //check if player 1 wins
                    if($p1s > $p2s)
                    {
                        //update player 1 POOL wins 
                        $sql5 = "update gameData set POOL_WINS = POOL_WINS + '$win' where ID = '$p1ID'";                             
                        mysqli_query($con, $sql5);
                        $num_row5 = mysqli_affected_rows($con);
                        

                        if($num_row5 == 1)
                        {
                            //update player 2 POOL loss 
                            $sql6 = "update gameData set POOL_LOSS = POOL_LOSS + '$loss' where ID = '$p2ID'";                             
                            mysqli_query($con, $sql6);
                            $num_row6 = mysqli_affected_rows($con);
                            

                            if($num_row6 == 1)
                            {
                             //update player 1 and 2 Rank points
                            $sql7= "update gameData set RANKPOINTS = RANKPOINTS + '$rankWin' where ID = '$p1ID';
                                    update gameData set RANKPOINTS = RANKPOINTS + '$rankLoss' where ID = '$p2ID' ";                             
                            mysqli_multi_query($con, $sql7);
                            $num_row7 = mysqli_affected_rows($con);
                            echo "update";   
                            }
                        }
                    }
                    //check if player 2 wins
                    else if($p1s < $p2s)
                    {
                        //update player 1 POOL loss 
                        $sql8 = "update gameData set POOL_LOSS = POOL_LOSS + '$loss' where ID = '$p1ID'";                             
                        mysqli_query($con, $sql8);
                        $num_row8 = mysqli_affected_rows($con);

                        if($num_row8 == 1)
                        {
                            //update player 2 POOL wins 
                            $sql9 = "update gameData set POOL_WINS = POOL_WINS + '$win' where ID = '$p2ID'";                             
                            mysqli_query($con, $sql9);
                            $num_row9 = mysqli_affected_rows($con);

                            if($num_row9 == 1)
                            {
                             //update player 1 and 2 Rank points
                            $sql10= "update gameData set RANKPOINTS = RANKPOINTS + '$rankLoss' where ID = '$p1ID';
                                    update gameData set RANKPOINTS = RANKPOINTS + '$rankWin' where ID = '$p2ID' ";                             
                            mysqli_multi_query($con, $sql10);
                            $num_row10 = mysqli_affected_rows($con);
                            echo "update";   
                            }
                        }
                    }
                    //check if draw
                    else
                    {
                        //update player 1 NBA loss 
                        $sql11  = "update gameData set NBA_WINS = NBA_WINS + '$win' where ID = '$p1ID'";                             
                        mysqli_query($con, $sql11);
                        $num_row11 = mysqli_affected_rows($con);
                        
                        if($num_row11 == 1)
                        {
                            //update player 2 NBA wins 
                            $sql12 = "update gameData set NBA_WINS = NBA_WINS + '$win' where ID = '$p2ID'";                             
                            mysqli_query($con, $sql12);
                            $num_row12 = mysqli_affected_rows($con);

                            if($num_row12 == 1)
                            {
                             //update player 1 and 2 Rank points
                            $sql13= "update gameData set RANKPOINTS = RANKPOINTS + '$rankWin' where ID = '$p1ID';
                                    update gameData set RANKPOINTS = RANKPOINTS + '$rankWin' where ID = '$p2ID' ";                             
                            mysqli_multi_query($con, $sql13);
                            $num_row13 = mysqli_affected_rows($con);
                            echo "update";   
                            }
                        }
                    }

                }
                else
                {
                    echo "player2 score not added";
                }   

            }
            else
            {
              echo "player1 score not added";
            }
        }
        else
        {
            echo "second";
        }
    }
    else
    {
        echo "first";
    }