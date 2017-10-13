<?php

		include 'dbconn.inc';

		$sql="SELECT user_id FROM user WHERE user_email='swatveeeer@gmail.com'";

		$result=mysql_query($sql);

		if(!$result)
		{
			echo "1"; //Some Error Occurred
			return;
		}

		$result=mysql_fetch_array($result);

		echo $result['user_id'];
		// //redirect the user to its page
		return;

?>