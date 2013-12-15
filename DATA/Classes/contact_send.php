<?php
//Author: Durwin Barcenas
//Date: December 12, 2013
	//initializing email
	$mail_to = '200203740@student.georgianc.on.ca'; 
	//Initialize post to these variables
	$name=$_POST['name']; 
	$email=$_POST['email']; 
	$phone=$_POST['phone']; 
	$message=$_POST['message']; 
	
	$subject = 'Forum visitor Message from visitor ' . $name; 
	
	$body_message='From: ' . $name. "\r\n"; 
	$body_message .='E-mail: ' . $email. "\r\n"; 
	$body_message .='Phone: ' . $phone. "\r\n"; 
	$body_message .='Message: ' . $message;; 
	
	//Construct email headers
		$headers = 'From: ' . $email . "\r\n";     
		$headers .= 'Reply-To: ' . $email . "\r\n";
	
	//Validaiton for Sending a email to the admin
	//if name, email, phone, and message not empty then send the email to the admin
	if(!empty($name) && !empty($email) && !empty($phone)
	&& !empty($message)){
	// sends an email to the admin
	$mail_sent = mail($mail_to, $subject, $body_message, $headers); 
	// if mail is sent is valid then an alert message window will pop out with a thank you message.
	if($mail_sent ==true) { ?>
		 <script language="javascript" type="text/javascript">
		 alert('Thank you for the message. We will contact you shortly.');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/contact_page.php");
		</script>
		<?php 
		}
		else //If message not sent do the statement bellow 
		{ ?>
		<script language="javascript" type="text/javascript">
		alert('Message not sent. Please, notify the site administrator dbbarcenas@gmail.com');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/contact_page.php");
		</script>
		<?php 
		}
		}
		else // If Fields are empty, alert message will pop out 
		{ ?>
		<script language="javascript" type="text/javascript">
		alert('ONE OR MORE OF THE FIELDS ARE EMPTY. Please Try Again.');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/contact_page.php");
		</script>
		<?php }
		
?>