<?php
session_start();
// $allowedExts = array("gif", "jpeg", "jpg", "png");
$allowedExts = array("doc", "docx", "odt", "pdf", "zip", "rar");
$temp = explode(".", $_FILES["image_file"]["name"]);
$extension = end($temp);
if ((($_FILES["image_file"]["type"] == "application/msword")
|| ($_FILES["image_file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["image_file"]["type"] == "application/vnd.oasis.opendocument.text")
|| ($_FILES["image_file"]["type"] == "application/pdf")
|| ($_FILES["image_file"]["type"] == "application/x-rar-compressed")
|| ($_FILES["image_file"]["type"] == "application/zip"))
&& ($_FILES["image_file"]["size"] < 1000000) //20000 == 20kb
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["image_file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["image_file"]["error"] . "<br>";
    }
  else
    {
    // echo "Upload: " . $_FILES["image_file"]["name"] . "<br>";
    // echo "Type: " . $_FILES["image_file"]["type"] . "<br>";
    // echo "Size: " . ($_FILES["image_file"]["size"] / 1024) . " kB<br>";
    //echo "Stored in: " . $_FILES["image_file"]["tmp_name"];
    }
  }
else
  {
  echo "Invalid file";
  die();
  }

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}

try {
$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);

$finalFileName = "";

if(isset($_SESSION['user_id'])){
	$finalFileName = $_SESSION['user_id'].' '.$_FILES["image_file"]["name"];
	echo $finalFileName;
}
else{

	echo<<<EOF
<p>Kindly login to post the file</p>
EOF;
return;
}


// if (file_exists("uploads/" . $_FILES["image_file"]["name"]))
//       {
//       echo $_FILES["image_file"]["name"] . " already exists. ";
//       unlink("uploads/" . $_FILES["image_file"]["name"]);
//       echo "file Deleted...";
//         move_uploaded_file($_FILES["image_file"]["tmp_name"],
//       "uploads/" . $_FILES["image_file"]["name"]);
// echo <<<EOF
// <p>Your file: {$sFileName} has been successfully updated.</p>
// EOF;
//       return; 
//       }
//     else
//       {
//       move_uploaded_file($_FILES["image_file"]["tmp_name"],
//       "uploads/" . $_FILES["image_file"]["name"]);
//       //echo "Stored in: " . "uploads/" . $_FILES["image_file"]["name"];
//       }
    

if (file_exists("uploads/" . $finalFileName))
      {
      echo $finalFileName . " already exists.\n ";
      unlink("uploads/" . $finalFileName);
      echo "file Deleted...";
        move_uploaded_file($_FILES["image_file"]["tmp_name"],
      "uploads/" . $finalFileName);
echo <<<EOF
<p>Your file: {$finalFileName} has been successfully updated.</p>
EOF;
      return; 
      }
    else
      {
      move_uploaded_file($_FILES["image_file"]["tmp_name"],
      "uploads/" . $finalFileName);
      //echo "Stored in: " . "uploads/" . $_FILES["image_file"]["name"];
      }



echo <<<EOF
<p>Your file: {$sFileName} has been successfully received.</p>
EOF;
// <p>Type: {$sFileType}</p>
// <p>Size: {$sFileSize}</p>
} catch (RuntimeException $e) {

    echo $e->getMessage();

}


// if ((($_FILES["image_file"]["type"] == "image/gif")
// || ($_FILES["image_file"]["type"] == "image/jpeg")
// || ($_FILES["image_file"]["type"] == "image/jpg")
// || ($_FILES["image_file"]["type"] == "image/pjpeg")
// || ($_FILES["image_file"]["type"] == "image/x-png")
// || ($_FILES["image_file"]["type"] == "image/png"))