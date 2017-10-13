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
<p style="margin:20px;padding:0;font-size:50px">Register Here...</p>
</div>


<div id="register_form" style="width:55%;border-right:1px solid rgb(0,0,0);float:left">
<form action="" method="post" name="register_form" style="padding:15px 30px 0px 15px;">
<table style="margin-left:auto;margin-right:auto;">
<tr>
<td colspan="2"><input type="text" placeholder="First Name" data-validation="required" name="lname" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;" >

<br></td>
</tr>

<tr>
<td colspan="2"><input type="text" placeholder="Last Name" data-validation="required" name="llname" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</td>
</tr>

<!-- <tr>
<td colspan="2"><input type="text" placeholder="Name of College" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"></td>
</tr> -->

<tr>
<td colspan="2"><input type="password" placeholder="Password" data-validation="length" data-validation-length="min6" name="pass_confirmation" id="#password" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</td>
</tr>

<tr>
<td colspan="2"><input type="password" placeholder="Confirm Password" data-validation="confirmation" name="pass" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</td>
</tr>

<tr>
<td colspan="2"><input type="text" placeholder="Email address" data-validation="email" name="email" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</td>

</tr>

<!-- <tr>
<td colspan="2"><input type="text" placeholder="Team Name" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"></td>
</tr> -->

<!-- <tr>
<td colspan="2"><div style="width:360px;height:30px;padding:5px;"><input id="check" type="checkbox"  name="accom" style="padding:2px;width:20px;height:20px;"><label style="margin-left:10px;font-size:20px;cursor:pointer;" onclick="javascript:set_checkbox()">Want Accomodation</label></div></td>
</tr>
 -->

 <tr>
<td colspan="2">
<?php drawcaptcha(); ?>
<input id="num1" name="num1" value="<?php echo $num1;?>" readonly style="width:50px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"/> +

<input id="num2" name="num2" value="<?php echo $num2;?>" readonly style="width:50px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"/> =

<input type="text" placeholder="Result" name=./backend/sankalan_m.php"sum" id="sum" data-validation="number" data-validation="required" style="width:70px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</tr>


<tr >
<td align="center"><input type="submit" value="Register Me" name="register_submit" id="register_submit" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:150px;height:50px;border-radius:5px;padding: 7px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115">
<input type="hidden" name="rand" value="<?php echo md5($rand); ?>">
</td>
<td>
<a href="" style="display:inline-block;float:left"><img src="./images/fbIcon.png"></a>
</td>
</tr>

</table>
</form>
</div>



<div id="register_login_form" style="width:42%;float:right;text-align:center">
<article style="font-size:30px;margin-top:80px">Already Registered!</article>
<form action="" method="" style="padding:15px 30px 0px 15px">
<table style="margin-left:auto;margin-right:auto;">
<tr>
<td colspan="2"><input type="text" name="email" id="email_id" data-validation="email" placeholder="User Email" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
<br>
</td>
</tr>

<tr>
<td colspan="2"><input type="password" name="password" id="password_login" data-validation="length" data-validation-length="min6" placeholder="Password" style="width:360px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;text-align:center;">
<br>
</td>
</tr>

<!-- <tr>
<td colspan="2">
<?php drawcaptcha(); ?>
<input id="num1" name="num1" value="<?php echo $num1;?>" readonly style="width:50px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"/> +

<input id="num2" name="num2" value="<?php echo $num2;?>" readonly style="width:50px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;"/> =

<input type="text" placeholder="Result" name=./backend/sankalan_m.php"sum" id="sum" data-validation="number" data-validation="required" style="width:70px;height:30px;border-color:#bdc7d8;border-radius:5px;border:1px solid #bdc7d8;padding:5px;">
<br>
</tr>

 --><tr >
<td align="center" valign="middle"><input type="submit" id="login_button" name="login_button" value="Login" style="color:#fff;background: linear-gradient(top, #79bc64, #578843);background-color: #69a74e;letter-spacing: 1px;width:100px;height:40px;border-radius:5px;padding: 7px 20px;border:1px solid;text-shadow: 0 1px 2px rgba(0,0,0,0.5);cursor:pointer;box-shadow:inset 0 1px 1px #a4e388;border-color: #3b6e22 #3b6e22 #2c5115">
<input type="hidden" name="rand" value="<?php echo md5($rand); ?>">

</td>
<td><a href="javascript:FBLogin()"><img src="./images/fbIcon.png"></a></td>
</tr>

</table>
</form>
</div>

<article id="register_close" style="position:absolute;top:50px;right:50px;cursor:pointer" onclick="javascript:register_form_hide()">
<img src="./images/arrow1.png" height="30px" width="40px">
</article>


