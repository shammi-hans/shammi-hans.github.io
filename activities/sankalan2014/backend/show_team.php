<?php

if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	$email=$_SESSION['email'];
	$user_name=0;
	$user_email=0;
	$user_team_id=0;
	$team_name=0;
	$college_name=0;
	$team_leader=0;
	$team_size=0;
	$members=array();
	$team_flag=1;
	$is_team = 1;

	$sql="SELECT user_team_id,user_name,user_lname FROM user WHERE user_email='$email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		$team_flag=0;
		return;
	}

	while($rs=mysql_fetch_array($result))
	{
		if($rs['user_team_id']==0)
		{
			$is_team=0;
			return;
		}

		$user_team_id=$rs['user_team_id'];
		$user_name=$rs['user_name']." ".$rs['user_lname'];
	}

	$sql="SELECT * FROM teamInfo WHERE team_id='$user_team_id'";

	$result=mysql_query($sql);

	if(!$result)
	{
		$team_flag=0;
		return;
	}

	while($rs=mysql_fetch_array($result))
	{
		$team_name=$rs['team_name'];
		$college_name=$rs['college_name'];
		$team_leader=$rs['team_leader'];
		$team_size=$rs['team_size'];
	}

	$sql="SELECT user_name,user_lname FROM user WHERE user_team_id='$user_team_id' and user_email !='$team_leader'";

	$result=mysql_query($sql);

	if(!$result)
	{
		$team_flag=0;
		return;
	}

	$memCount=0;

	while($rs=mysql_fetch_array($result))
	{
		$members[$memCount]=$rs['user_name']." ".$rs['user_lname'];
		$memCount++;
	}

	$sql="SELECT user_name,user_lname FROM user WHERE user_email='$team_leader'";

	$result=mysql_query($sql);

	if(!$result)
	{
		$team_flag=0;
		return;
	}

	$rs=mysql_fetch_array($result);

	$team_leader=$rs['user_name']." ".$rs['user_lname'];

}
else
{
	return;
}
?>