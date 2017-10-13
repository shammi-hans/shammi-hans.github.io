<?php
session_start();

if(isset($_SESSION['rand']))
{
	include 'dbconn.inc';

	$user_email=addslashes(trim($_POST['email']));
	$pass=md5($_POST['password']);
	$ps=0;

	$sql="SELECT * FROM user WHERE user_email='$user_email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		echo "3";
		return;
	}

	$rows=mysql_num_rows($result);

	if($rows==0)
	{
		echo "2";
		return;
	}

	while($rs = mysql_fetch_array($result)) 
	{
		$ps = $rs['user_pass'];
	}

	if($ps==$pass)
	{

		$sql="SELECT user_id_hash FROM user WHERE user_email='$user_email'";

		$result=mysql_query($sql);

		if(!$result)
		{
			echo "3"; //Some Error Occurred
			return;
		}

		$result=mysql_fetch_array($result);

		$_SESSION['logged_in']=true;
		$_SESSION['user_id']=$result['user_id_hash'];
		$_SESSION['email']=$user_email;

		//  echo "<meta http-equiv='refresh' content='0;../indexx.php'>";
		// // //redirect the user to its page
		echo "0";
		return;
	}

	else
	{
		echo "1";
		return;
	}
	
}

?>