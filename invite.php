<?php
/**
 * Created by PhpStorm.
 * User: fruitjam
 * Date: 13/10/17
 * Time: 5:59 PM
 */
	require_once 'Database.php';
	$comment =  nl2br($_POST['comment']);
	$sql = "SELECT EMAIL FROM `register`";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
		
	if($count > 0)
	{
		while($row = mysqli_fetch_array($res))
		{
			$email[] = $row['EMAIL'];
			
		}	
		$to = implode(", ", $email);
		$subject = "Tournament Invitation";
		
		$message = "<html>
	  				<head></head>
	                <body>
	                <img src = 'https://theinstillery.com/wp-content/uploads/2015/11/logo.png' height='200' width='600'>
	                    <p>$comment</p>
	                </body>
	                </html>";
	        
	        $headers[]= "MIME-Version: 1.0";
	        $headers[]= "Content-type: text/html; charset=iso-8859-1";
	        $headers[] = "From: hello@theinstillery.com";

	        if(mail($to, $subject, $message, implode("\r\n",$headers)))
	        {
	        	echo "success";
	        }
	        else
	        {
	        	echo "not success";
	        }
	}
	else
	{
		echo "records";
	}