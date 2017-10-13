<?php
// session_start();

if(isset($_SESSION['isAdmin'])){




}
else{
	echo "<script>alert('You are not an Admin');</script>";
}

function sankuMail($email){


	$to = $email; // Send email to our user
	$subject = 'Sankalan 2014, The Annual Technical Festival of Department of Computer Science, University of Delhi'; // Give the email a subject 
	$message = "
	Test Mail
			 
For any queries reach us at webquery@sankalan.info.

"; 

// Our message above including the link
                     
         $from = "Sankalan2014@sankalan.info";
         $headers = "From:" . $from;

         ini_set("SMTP","ftp.sankalan.info");
         ini_set("SMTP_PORT", 21); 
   
        $retval=mail($to, $subject, $message, $headers); // Send our email

 
      if( $retval == true )
      {
      		return 0;// Mail sent
      }
      else{
       		return 1; //Mail not sent
      }
}

?>