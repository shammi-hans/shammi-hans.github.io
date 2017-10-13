<?php


define('DB_USER','sankalan_main14');
define('DB_PASS','main14DUCS2014');
define('DB_HOST','localhost');
define('DB_DB','sankalan_main14');

$conn = mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('Could not connect to the MySQL Database. Please try again later. '.mysql_error());

if($conn) 
{
    mysql_select_db(DB_DB);
} 
else 
{
    echo "<p class=\"warning\">Could not connect to the dataBase.</p>";
    echo "<p>We apologise for the inconvenience</p>";
    exit();
}

?>