<?php
if ($_GET['randomId'] != "Qjh4N5FNqMgP67DEbHOOBdiXfxx13jQ14we9Xe9rw9L3tcEcMTtL5bDrtP3kd9Ow") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
