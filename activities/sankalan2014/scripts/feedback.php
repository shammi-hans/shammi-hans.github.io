<?php

include("dbConn.inc");

if(isset($_POST["message"]))
{
	if($_POST["message"]=="")
	{
		echo "2";
		return;
	}
}
if(isset($_POST["email"]) && isset($_POST["message"]))
{
	if(get_magic_quotes_gpc())
	{
		$_POST["email"]=stripslashes(trim($_POST["email"]));
		$_POST["message"]=stripslashes($_POST["message"]);
	}

	$email	=	mysql_real_escape_string($_POST["email"]);
	$message = mysql_real_escape_string($_POST["message"]);
	$email=strip_tags($email);
	$message=strip_tags($message);
	$email=trim($email);

	if ( filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$sql="SELECT * FROM feedback WHERE user_email='$email'";

		if(!$result=mysql_query($sql))
		{
			echo "3";
			return 3;
		}

		$numRow	=	mysql_num_rows($result);

		if($numRow>0)
		{
			$sql="UPDATE feedback SET message='$message' WHERE user_email='$email'";

			if(!$result=mysql_query($sql))
			{
				echo "3";
				return;
			}

			echo "0";
			return;

		}

		$sql="INSERT INTO feedback (user_email,message) VALUES ('$email','$message')";
		
		if(!$result=mysql_query($sql)) 
		{
			echo "3";
			return 3;
		}

		echo "0";
		return 0;
	}
		
	else
	{
		echo "1";
		return 1;
	}
}
else
{
	echo "2";
	return;
}
?>