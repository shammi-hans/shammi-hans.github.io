<?php
session_set_cookie_params(0);
session_start();


if(isset($_POST['register_submit']) && isset($_POST['rand']) && isset($_SESSION['rand']))
{

	session_regenerate_id();

	$session_id=session_id();

	$_SESSION['id']=$session_id;

 	$rand=$_POST['rand'];
 	$rand1=md5($_SESSION['rand']);

	if($rand!=$rand1)
	{
		echo "helo";
		return;
	}


	if(isset($_POST['lname']) && isset($_POST['llname'])  && isset($_POST['pass_confirmation']) && isset($_POST['email']) )
	{

	$lname = addslashes(trim($_POST['lname']));
	$llname = addslashes(trim($_POST['llname']));
	$pass= $_POST['pass_confirmation'];
	$email = addslashes(trim($_POST['email']));

	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		return;
	}

	$_SESSION['lname']=$lname;
	$_SESSION['llname']=$llname;
	$_SESSION['pass']=$pass;
	$_SESSION['email']=$email;

		// $sql = "SELECT user_email FROM user WHERE user_email='$email'";
		
		// if($result=mysql_query($sql))
		// {
		// 	$rowcount=mysql_num_rows($result);
			
		// 	if ($rowcount)
		// 	{
		// 		return 1; //User Already present
		// 	}
		// 	else
		// 	{
		// 		$sql="INSERT INTO user(user_name,user_lname,user_pass,user_email) VALUES('$lname','$llname', '$pass' ,'$email')";
		
		// 		if(!mysql_query($sql))
		// 		{
		// 				return 3; //Some Error Occured
		// 		}

		// 		$sql="SELECT user_id FROM user WHERE user_email='$email'";

		// 		if(!($result=mysql_query($sql)))
		// 		{
		// 			return 3; //Some Error Occured
		// 		}
		

// 			$to = $email; // Send email to our user
// 			$subject = 'Signup | Verification'; // Give the email a subject 
// 			$message = '
			 
// Thanks for signing up!
// Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
// -----------------------------------------------------------------------
// User code : '.$result.'
// -----------------------------------------------------------------------'; 

// // Our message above including the link
                     
//          $from = "Sankalan@sankalan.info";
//          $headers = "From:" . $from;

//          ini_set("SMTP","ftp.sankalan.info");
//          ini_set("SMTP_PORT", 21); 
   
//         $retval=mail($to, $subject, $message, $headers); // Send our email

//       //if( $retval == true )  
      //{
      //echo "Dear user,Please check your email-account for login details, which you filled in the form while registering for Sankalan 2014";
     // }
       //else
      //
      //echo "Message could not be sent...";
      //    
	  

		 echo "<meta http-equiv='refresh' content='0;./fbRed.php?rand=$rand'>"; // Success
			
// 		}

// 	}

// 		else
// 		{
// 			return 3; //Some Error Occured
// 		}

// }

	}

	else
	{
		echo "<meta http-equiv='refresh' content='0;http://www.sankalan.info'>";
		return;
	}

}


else
{
	echo "<meta http-equiv='refresh' content='0;http://www.sankalan.info'>";
	return;
}
			
?>

<html>
<head>
<link rel="shortcut icon" href="../images/favicon.ico">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    	<meta content="Sankalan 2014, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">
		<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2014, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		
		<title> Sankalan 2014 - Annual festival of Delhi University Computer Science Society </title>
</head>
<body></body>
</html>