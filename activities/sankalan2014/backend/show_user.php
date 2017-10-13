<?php

include './backend/dbconn.inc';

if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	$email=$_SESSION['email'];
	$user_id=0;
	$user_name=0;
	$user_mobile=0;
	$user_accom=0;
	$user_flag=1;
        $isleader=0;

	$sql="SELECT * FROM user WHERE user_email='$email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		$user_flag=0;
		return;
	}
        
       
	while($rs=mysql_fetch_array($result))
	{
		$user_id=$rs['user_id'];
                $user_id_hash=$rs['user_id_hash'];
		$user_name=$rs['user_name']." ".$rs['user_lname'];
		$user_mobile=$rs['user_phone'];
		$user_accom=$rs['user_accomodation'];
	}
        $sql="SELECT * FROM teamInfo WHERE team_leader='$email'";

	$result=mysql_query($sql);

	if(mysql_num_rows($result)>0)
	{
		$isleader=1;
	}

}

else
{
	return;
}
?>