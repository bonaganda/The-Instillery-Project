<?php 
session_start();
$_SESSION['message'] ="";
$_SESSION['success'] ="";
require './Database.php';
$id = rand(10000, 99999);

if(isset($_POST['register_btn'])) {
    //make sure 2 password are equal to each other
    if($_POST['password'] == $_POST['confirmPass']) {
        if($_POST['email'] == $_POST['confirmEmail']) {
            
            //variables for registering a user
            $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
            $password =  $_POST['password'];
            $email =  mysqli_real_escape_string($con, $_POST['email']);
            $image_path = mysqli_real_escape_string($con, 'ProfileImages/'.$_FILES['image']['name']);

        
           //Check if table exist
            $tableSearch = mysqli_query($con, "SHOW TABLES LIKE 'register'");
            $numOfTables = mysqli_num_rows($tableSearch);
            $tableExists;
            if($numOfTables <=0){
                    $tableExists = false;
            } else {
                    $tableExists = true;
            }

            //Create table if it doesn't exist
            $createTable = "CREATE TABLE IF NOT EXISTS register (
                            ID INT(5) NOT NULL,
                            FULLNAME VARCHAR(30) NOT NULL,
                            PASSWORD VARCHAR(20) NOT NULL,
                            EMAIL VARCHAR(50) NOT NULL,
                            IMAGE VARCHAR(100),
                            PRIMARY KEY (ID)
                            )";
            
            if($tableExists == false) {
                $queryTable = mysqli_query($con, $createTable);
            } 
            
            //check if id is unique
            $sql = "SELECT * FROM register WHERE ID = '$id'";
            $result = mysqli_query($con, $sql);
            while($row = $result -> fetch_assoc()) {
                    $id = rand(10000, 99999);
                    $result = mysqli_query($con, $sql);
            }
            
            //Checks database for existing users
            $sql = "SELECT * FROM register WHERE EMAIL = '$email'";
            $result = mysqli_query($con, $sql);

            if($row = $result-> fetch_assoc()) {
                $_SESSION['message'] = "Email is already in use.";
            } else {
                //make sure file type is image
                if(preg_match("!image!", $_FILES['image']['type'])) {
                    //copy image to images/ folder
                    if(copy($_FILES['image']['tmp_name'], $image_path)) {

                        //test
//                        $insertQuery ="INSERT INTO register
//                            (ID, FULLNAME, PASSWORD, EMAIL, IMAGE) VALUES ('$id', '$fullname', '$password', '$email', '$image_path')";
//                        $res = mysqli_query($con, $insertQuery);

                        $insertQuery ="INSERT INTO register
                            (ID, FULLNAME, PASSWORD, EMAIL, IMAGE) VALUES ('$id', '$fullname', '$password', '$email', '$image_path'); INSERT INTO gameData(ID) VALUES('$id');";
                            $res = mysqli_multi_query($con, $insertQuery);

                        if(!$res) {
                            $_SESSION['message'] = "Account creation failed! $id";
                        } else {
                            $_SESSION['success'] = "Registration Successful!";
                        }
                    } else {
                        $_SESSION['message'] = "Cant copy files";
                    }
                } else {
                    $_SESSION['message'] = "Must be an IMAGE file!";
                }
                
                //registers a player under a game if player chose to
                //Check registered games
                $createGamesTableQuery = "CREATE TABLE IF NOT EXISTS games(
                                FIFA VARCHAR(30),
                                NBA VARCHAR(30),
                                Pool VARCHAR(30)
                                )";
                $createGamesTable = mysqli_query($con, $createGamesTableQuery);

                if(isset($_POST['fifaCheckbox'])) {
                    $insertQuery ="INSERT INTO games
                        (FIFA) VALUES ('$fullname')";
                    $result = mysqli_query($con, $insertQuery);
                }
                if(isset($_POST['poolCheckbox'])) {
                    $insertQuery ="INSERT INTO games
                        (Pool) VALUES ('$fullname')";
                    $result = mysqli_query($con, $insertQuery);
                } 
                if (isset($_POST['nbaCheckbox'])) {
                    $insertQuery ="INSERT INTO games
                        (NBA) VALUES ('$fullname')";
                    $result = mysqli_query($con, $insertQuery);
                }
            }
        } else {
            $_SESSION['message'] = "Email must match!";
        }
    } else {
        $_SESSION['message'] = "Password must match!";
    }
    
}