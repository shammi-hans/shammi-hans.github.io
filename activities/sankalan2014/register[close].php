<?php

$num1=0;
$num2=0;

$rand=rand();

$_SESSION['rand']=$rand;
include "./backend/drawcaptcha.php";
?>


<div id="register_container" style="position:absolute;top:-800px;left:0px;width:100%;overflow:hidden;height:100%;background-color:rgba(76,78,76,0.9)">
<div id="closed" style="height:100%;width:100%;position:absolute;background-color:(0,0,0,0.5);top:0px;z-index:100">
<div style="position:absolute;top:40%;left:39%;color:#fff;">
<h1>Registration has been closed</h1>

</div>

</div>



<div id="register_header" style="position:relative;margin-top:40px;width:100%;height:100px;text-align:center;">
<p style="margin:20px;padding:0;font-size:50px"></p>
</div>


<div id="register_form" style="width:55%;border-right:1px solid rgb(0,0,0);float:left">
<form action="" method="post" name="register_form" style="padding:15px 30px 0px 15px;">

</form>
</div>



<div id="register_login_form" style="width:42%;float:right;text-align:center">

<form action="" method="" style="padding:15px 30px 0px 15px">

</form>
</div>

<article id="register_close" style="position:absolute;top:50px;right:50px;cursor:pointer" onclick="javascript:register_form_hide()">
<img src="./images/arrow1.png" height="30px" width="40px">
</article>


