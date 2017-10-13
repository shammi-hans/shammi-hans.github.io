<?php
	session_start();

	include "dbconn.inc";


if( isset($_POST['team_name']) && isset($_POST['college_name']) && isset($_POST['team_size']) && isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	$team_name=stripslashes(trim($_POST['team_name']));
	$college_name=stripslashes(trim($_POST['college_name']));
	$team_size=stripslashes(trim($_POST['team_size']));
	$team_array=array();
	$email=$_SESSION['email'];

	$sql="SELECT * FROM user WHERE user_email='$email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		echo "1";
		return;
	}

	$rows=mysql_fetch_array($result);


	if($rows['user_team_id']!=0)
	{
		echo "You Already a part of a team";
		return;
	}

	if($team_size<1 || $team_size > 6)
	{
		//print error;
		echo "0";
		return;
	}
	
	$j=0;

	for($i=0;$i<5;$i++)
	{
		if(isset($_POST['team_member_'.($i+1)]))
		{
			$team_array[$j]=$_POST['team_member_'.($i+1)];
                        if($team_array[$j]==$rows['user_id_hash'])
                        {
                             echo "You can't provide your own secret key";
                             return;
                         }
			$j++;
		}
	}

	for($i=0;$i<$j;$i++)
	{
		$sql="SELECT * FROM  user WHERE user_id_hash='$team_array[$i]'";
		$result=mysql_query($sql);
		if(!$result)
		{
			//print error;
			echo "1";
			return;
			//break;
		}

		$rows=mysql_num_rows($result);

		if($rows==0)
		{
			//User with $team_array[$i] email Id is not registered 
			echo $team_array[$i];
			echo " is not a registered user";
			return;
		}

		$rs=mysql_fetch_array($result);

		if($rs['user_team_id']!=0)
		{
			echo $team_array[$i];
			echo "is already in some team"; //Already in some team
			return;
		}
	}

	$sql="INSERT INTO teamInfo(team_name,college_name,team_size,team_leader) VALUES('$team_name','$college_name','$team_size','$email')";

	$result=mysql_query($sql);

	if(!$result)
	{
		echo "1"; //sql error
		return;
	}

	$team_id=mysql_insert_id();

	$sql="UPDATE user SET user_team_id='$team_id' WHERE user_email='$email'";

	$result=mysql_query($sql);

	for($i=0;$i<$j;$i++)
	{
		
		$sql="UPDATE user SET user_team_id='$team_id' WHERE user_id_hash='$team_array[$i]'";
		
		$result=mysql_query($sql);
		
		if(!$result)
		{	
			echo "1";
			//print error;
			return;
			//break;
		}
	}

	echo "5";
}
else
{
	return;
}
?>