<!-- This file is used to connect the website to the database -->

<?php
//connect to DB
try {
    $con = mysqli_connect('localhost', 'instillery', '12345', 'instillery');
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . +$e->getMessage());
}