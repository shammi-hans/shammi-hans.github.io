<?php
if ($_GET['randomId'] != "1isS_bzd1TLhY2I_rvH4G_yrzSSFQMUgDGXrs9FKPOcv2xYGGiJDVflVYn5vF49I") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
