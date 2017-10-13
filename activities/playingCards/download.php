<?php
	$file = trim($_GET['path']);
 
	// force user to download the image
	if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: image/png');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: -1');
		//header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		//header('Pragma: public');
		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
		header("Pragma: no-cache");
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		unlink($file);
		exit;
	}
	else {
		echo "$file not found";
	}