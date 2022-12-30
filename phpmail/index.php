<!DOCTYPE html>
<html>
<head>
	<title>SENDING EMAIL</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">Sending Emails in PHP </h1>

<hr>
	<?php 
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;


			$mail->isSMTP();                                    
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                            
			$mail->Username = EMAIL;                 
			$mail->Password = PASS;                         
			$mail->SMTPSecure = 'tls';                           
			$mail->Port = 587;                                   

			$mail->setFrom(EMAIL, 'Asish');
			$mail->addAddress($_POST['email']);     

			$mail->addReplyTo(EMAIL);
			$mail->isHTML(true);                                  

			$mail->Subject = $_POST['subject'];
			$mail->Body    = '<div style="border:2px solid red;">This is the HTML </div>';
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	 ?>
	<div class="row">
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">To Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="" maxlength="50">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Send</button>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>
