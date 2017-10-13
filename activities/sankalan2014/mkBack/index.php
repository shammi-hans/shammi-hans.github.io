<?php
session_start();

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/^sankalan_mkback/',$useragent)){
echo "Welcome Maester";

echo "<script>

	window.location = './indexx.php';
</script>";

$_SESSION['isAdmin'] = true;
}
else{
	echo "You are not allowd to enter this realm!!!";
}



?>