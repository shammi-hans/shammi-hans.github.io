<?php
session_start();

include 'dbconn.inc';

if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	if(isset($_POST['delete']))
	{
		$user_id=$_SESSION['user_id'];
		$sql="SELECT * FROM user WHERE user_id_hash='$user_id'";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo "0";//SQL error
			return;;
		}
		if(mysql_num_rows($result)==0)
		{
			echo "1"; //user not exists
			return;
		}
		$rs=mysql_fetch_array($result);
		$email=$rs['user_email'];
		$sql="SELECT * FROM teamInfo WHERE team_leader='$email'";
		$result=mysql_query($sql);
		if(!$result)
		{
			echo "0";//SQL error
			return;
		}
		if(mysql_num_rows($result)==0)
		{
			echo "2"; //User is not leader
			return;
		}
		$rs=mysql_fetch_array($result);
		$team_id=$rs['team_id'];
                $sql1="SELECT user_email FROM user WHERE user_team_id='$team_id'";
                $result=mysql_query($sql1);
                if(!$result)
                {
                        echo "0"; //SQL error
                        return;
                }

                while($rs=mysql_fetch_array($result))
                {
                       $email1=$rs['user_email'];
                       $sql="UPDATE user SET user_team_id=0 WHERE user_email='$email1'";
         		if(!mysql_query($sql))
	         	{
		        	echo "0"; //SQl error
			        return;
         		}
                }

		$sql="DELETE FROM teamInfo WHERE team_leader='$email'";
		if(!mysql_query($sql))
		{
			echo "0";//SQL error
			return;
		}

		echo "3"; //success
	}
}



?>