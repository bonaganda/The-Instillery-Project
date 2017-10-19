<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 9/8/17
 * Time: 12:15 AM
 */
session_start();
session_destroy();
header("Location: index.php");