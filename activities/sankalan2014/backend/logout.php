<?php
session_start();

 if(isset($_SESSION['user_id']) && isset($_SESSION['logged_in']))
{
	session_destroy();
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
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