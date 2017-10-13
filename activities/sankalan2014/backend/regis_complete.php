<?php
session_start();

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if(!$isAjax)
{
	return;
}

include './dbconn.inc';

function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if(isset($_POST['phone']) && isset($_POST['accom']) && isset($_SESSION['id']) && isset($_SESSION['email']))
{
	if (!get_magic_quotes_gpc())
	{
		$lname=addslashes(trim($_SESSION['lname']));
		$llname=addslashes(trim($_SESSION['llname']));
		$pass=addslashes(trim(md5($_SESSION['pass'])));
		$email=addslashes(trim($_SESSION['email']));
		$phone=addslashes(trim($_POST['phone']));
		$accom=addslashes(trim($_POST['accom']));
	}

	$sql="SELECT user_email FROM user WHERE user_email='$email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		echo "1"; //Some Error Occurred
		return;
	}

	$num_rows=mysql_num_rows($result);

	if($num_rows>0)
	{
		echo "2"; //User Already Present
		return ;
	}

	$sql="INSERT INTO user(user_name,user_lname,user_pass,user_email,user_accomodation,user_phone) VALUES('$lname','$llname', '$pass' ,'$email','$accom','$phone')";

	if(!mysql_query($sql))
	{
		echo "1"; //Some Error Occurred
		return ;
	}

	$id=mysql_insert_id();

	$user_id = $id;
	$user_id = md5($user_id);
	$user_id = substr($user_id, 0, 7);

	$sql="UPDATE user SET user_id_hash='$user_id' WHERE user_email='$email'";

	if(!mysql_query($sql))
	{
		echo "1";
		return;
	}

	$_SESSION['user_id']=$user_id;
	$_SESSION['logged_in']=true;

		//Success

			$to = $email; // Send email to our user
			$subject = 'Sankalan 2014, The Annual Technical Festival of Department of Computer Science, University of Delhi'; // Give the email a subject 
			$message = "
			 
Thanks for signing up for Sankalan 2014.
We are glad to have you aboard.
Your account has been created, Now you can login by using your email and password.
 
-----------------------------------------------------------------------
Your Secret Key : ".$_SESSION['user_id']."
Your SID : ".$id."
Your Password: ".$_SESSION['pass']."
-----------------------------------------------------------------------

HOW TO REGISTER YOUR TEAM:-

1. Go to sankalan.info.

2. Click on MyPage button(Make sure that you are logged in).

3. You'll see a form to create a team on the right side of your page.

4. Enter the required details, including the Team Name, and the Secret key of your team members(which they must have received in their registration confirmation email)

(Note: Make sure all your team members are already registered on sankalan.info, before creating the team).

5. Enter the team size including you, between 2 and 6.
   (For instance, if your team size is 2 then you'll have to give only 1 secret key i.e, the Secret key of your partner.
   or if your team size is 3 then you'll have to give 2 Secret keys and similarly for all other cases.)

6. The one who is creating the team will be the team leader of the team.

You(except the team leader) can change the team at anytime from your MyPage.

For any queries you may reach us at webquery@sankalan.info.

"; 

// Our message above including the link
                     
         $from = "Sankalan@sankalan.info";
         $headers = "From:" . $from;

         ini_set("SMTP","ftp.sankalan.info");
         ini_set("SMTP_PORT", 21); 
   
        $retval=mail($to, $subject, $message, $headers); // Send our email

      if( $retval == true )
      {
      	echo "3"; // Mail sent
      	}
       else
       	echo "4"; //Mail not sent  
}

else if(isset($_POST['fb']) && isset($_SESSION['code']))
{	
	if(!isset($_POST['lname']) || !isset($_POST['llname']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['accom']))
	{
		echo "0";
		return;
	}

	$lname=$_POST['lname'];
	$llname=$_POST['llname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$accom=$_POST['accom'];
	$code=$_SESSION['code'];

	$password=randomPassword();
	
	$pass=md5($password);

	$sql="SELECT user_email FROM user WHERE user_email='$email'";

	$result=mysql_query($sql);

	if(!$result)
	{
		echo "0";
		return; //Some Error Occurred
	}

	$num_rows=mysql_num_rows($result);

	if($num_rows>0)
	{
		echo "1";
		return ; //User Already Present
	}

	$sql="INSERT INTO user(user_name,user_lname,user_pass,user_email,user_accomodation,user_phone,fb_code) VALUES('$lname','$llname', '$pass' ,'$email','$accom','$phone','$code')";

	if(!mysql_query($sql))
	{
		echo "0";
		return;
		//return 2; //Some Error Occurred
	}

        $id=mysql_insert_id();

	$user_id = $id;
	$user_id = md5($user_id);
	$user_id = substr($user_id, 0, 7);

	$sql="UPDATE user SET user_id_hash='$user_id' WHERE user_email='$email'";

	if(!mysql_query($sql))
	{
		echo "1";
		return;
	}

	
	$_SESSION['user_id']=$user_id;
	$_SESSION['logged_in']=true;

	session_regenerate_id();

	$session_id=session_id();

	$_SESSION['id']=$session_id;
	$_SESSION['email']=$email;

	
	//alert("hurray");

	$to = $email; // Send email to our user
			$subject = 'Sankalan 2014, The Annual Technical Festival of Department of Computer Science, University of Delhi'; // Give the email a subject 
			$message = "
			 
Thanks for signing up for Sankalan 2014.
We are glad to have you aboard.
Your account has been created, Now you can login by using your email and password.
 
-----------------------------------------------------------------------
Your Secret Key : ".$_SESSION['user_id']."
Your SID : ".$id."
Your Password: ".$password."
-----------------------------------------------------------------------

HOW TO REGISTER YOUR TEAM:-

1. Go to sankalan.info.

2. Click on MyPage button(Make sure that you are logged in).

3. You'll see a form to create a team on the right side of your page.

4. Enter the required details, including the Team Name, and the Secret key of your team members(which they must have received in their registration confirmation email)

(Note: Make sure all your team members are already registered on sankalan.info, before creating the team).

5. Enter the team size including you, between 2 and 6.
   (For instance, if your team size is 2 then you'll have to give only 1 secret key i.e, the Secret key of your partner.
   or if your team size is 3 then you'll have to give 2 Secret keys and similarly for all other cases.)

6. The one who is creating the team will be the team leader of the team.

You(except the team leader) can change the team at anytime from your MyPage.

For any queries you may reach us at webquery@sankalan.info.

"; 

// Our message above including the link
                     
         $from = "Sankalan2014@sankalan.info";
         $headers = "From:" . $from;

         ini_set("SMTP","ftp.sankalan.info");
         ini_set("SMTP_PORT", 21); 
   
        $retval=mail($to, $subject, $message, $headers); // Send our email

 
      if( $retval == true )
      {
      	echo "3"; // Mail sent
      	}
       else
       	echo "4"; //Mail not sent  
	//redirect to user page
}
else
{
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>