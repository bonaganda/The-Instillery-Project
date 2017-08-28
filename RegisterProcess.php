<?php 
session_start();
$_SESSION['message'] ="";
$_SESSION['success'] ="";
require './Database.php';

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
            $createTable = "CREATE TABLE IF NOT EXISTS register(
                            fullname VARCHAR(30) NOT NULL,
                            password VARCHAR(20) NOT NULL,
                            email VARCHAR(50) NOT NULL,
                            image VARCHAR(100)
                            )";

            if($tableExists == false) {
                $queryTable = mysqli_query($con, $createTable);
            } 
            //Checks database for existing users
            $sql = "SELECT * FROM register WHERE email = '$email'";
            $result = $con->query($sql);

            if($row = $result-> fetch_assoc()) {
                $_SESSION['message'] = "Email is already in use.";
            } else {
                //make sure file type is image
                if(preg_match("!image!", $_FILES['image']['type'])) {
                    //copy image to images/ folder
                    if(copy($_FILES['image']['tmp_name'], $image_path)) {
                        $insertQuery ="INSERT INTO register
                            (fullname, password, email, image) VALUES ('$fullname', '$password', '$email', '$image_path')";
                        $result = mysqli_query($con, $insertQuery);
                        if(!$result) {
                            $_SESSION['message'] = "Failed to create account!";
                        } else {
                            $_SESSION['success'] = "Registration Successful!";
                        }
                    } else {
                        $_SESSION['message'] = "Cant copy files";
                    }
                } else {
                    $_SESSION['message'] = "Must be an image file!";
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
                        (FIFA) VALUES ('$email')";
                    $result = mysqli_query($con, $insertQuery);
                } else if(isset($_POST['poolCheckbox'])) {
                    $insertQuery ="INSERT INTO games
                        (Pool) VALUES ('$email')";
                    $result = mysqli_query($con, $insertQuery);
                } else if(isset($_POST['nbaCheckbox'])) {
                    $insertQuery ="INSERT INTO games
                        (NBA) VALUES ('$email')";
                    $result = mysqli_query($con, $insertQuery);
                }
            }
        } else {
            $_SESSION['message'] = "Two emails must match!";
        }
    } else {
        $_SESSION['message'] = "Two passwords must match!";
    }
    
}