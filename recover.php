<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 13/10/17
 * Time: 1:44 PM
 */
	require_once 'Database.php';

    $username = mysqli_real_escape_string($con, $_POST['Email']);
	$sql = "SELECT * FROM `register` WHERE EMAIL = '$username'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	
	if($count == 1)
	{
		
		$r = mysqli_fetch_assoc($res);
		$password = $r['PASSWORD'];
		$to = $r['EMAIL'];
		$subject = "Password Recovery";
		$src="Images/logo.png";

		$message = "<html><head></head>
                    <body>
                    <img src = 'https://theinstillery.com/wp-content/uploads/2015/11/logo.png' height='200' width='600'>
                    <p>Please use this password to login <strong>$password</strong></p>
                    </body>
                    </html>";
        
        $headers[]= "MIME-Version: 1.0";
        $headers[]= "Content-type: text/html; charset=iso-8859-1";
        $headers[] = "From: hello@theinstillery.com";
        

		//Send Mail
		if(mail($to, $subject, $message, implode("\r\n",$headers)))
		{
			echo "password";
		}
		else
		{
			echo "Connection Failure";
		}
	}
	else
	{
		echo "email";
	}