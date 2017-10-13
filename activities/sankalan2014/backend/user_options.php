<?php
session_start();

include 'dbconn.inc';

if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	if(isset($_POST['remove_team']))
	{
		$email=$_SESSION['email'];
		$user_id_hash=$_SESSION['user_id'];

		$sql="SELECT * FROM user,teamInfo WHERE user_team_id=team_id AND team_leader='$email'";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo "0"; //SQL error
			return;
		}
		if(mysql_num_rows($result)>0)
		{
			echo "1"; //User is a team leader
			return;
		}
		$sql="SELECT user_team_id FROM user WHERE user_email='$email'";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo "0"; //SQL error
			return;
		}
		$rs=mysql_fetch_array($result);
		if($rs['user_team_id']==0)
		{
			echo "2"; //User is not in a team
			return;
		}
		$sql="UPDATE user SET user_team_id=0 WHERE user_email='$email'";
		if(!mysql_query($sql))
		{
			echo "0"; //SQL error
			return;
		}
                $team_id=$rs['user_team_id'];
		$sql="SELECT team_size FROM teamInfo WHERE team_id='$team_id'";
		$result=mysql_query($sql);
		$rs=mysql_fetch_array($result);
		$team_size=$rs['team_size']-1;
                if($team_size<1)
{
echo "0";
return;
}
		$sql="UPDATE teamInfo SET team_size='$team_size' WHERE team_id='$team_id'";
		mysql_query($sql);
		

		echo "3"; //Success
		return;
	}
}
else
{
	echo "hello";
}

?>