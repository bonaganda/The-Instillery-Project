<?php
//connect to DB
try 
	{
    	$con = mysqli_connect('instillerydb.cdtv862sgrwr.us-east-2.rds.amazonaws.com', 'master', 'horay1234', 'gamedb');
	}
	catch (mysqli_sql_exception $e) 
	{
    	die("Connection failed: " . +$e->getMessage());
	}
