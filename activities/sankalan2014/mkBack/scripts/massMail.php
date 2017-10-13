<?php
session_start();
$_SESSION['isAdmin'] = true;

include 'mail.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpexcel/Classes/');

include 'PHPExcel/IOFactory.php';

if(isset($_SESSION['isAdmin']) && isset($_POST['sendMassMails'])){

	$inputFileName = '../files/emails.xlsx';

	try {
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

	foreach ($sheetData as $emailId) {
		mailIt($emailId['A']);				
	}

}
else{
	echo 'session is not set'.$_SESSION['isAdmin'].$_POST['sendMassMails'];
}



function mailIt($to){

	$logFile = fopen('../logs/massMailLogs.txt','a');

	echo 'Mailing to '.$to.'<br />';

	if(sankuMail($to) == 0){
		echo 'Mail Sent to :'.$to.'<br >';
		fwrite($logFile,"Mail Sent to :".$to." \n");
		return;
	}
	else{
		echo 'Error Sending Mail to :'.$to.'<br >';
		fwrite($logFile,"unable to send mail to :".$to."\n");
		return;
	}

	fclose($logFile);
}

?>