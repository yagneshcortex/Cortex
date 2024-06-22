<?php
include("class.phpmailer.php");
function sendMail($address,$username,$body){
            $mail = new PHPMailer();
            $mail->IsSMTP(); // telling the class to use SMTP
            //$mail->Host       = "smtp.gmail.com"; // SMTP server
            $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                // 1 = errors and messages
                                                                           // 2 = messages only
            // $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            // $mail->Host       = "smtp.gmail.com";      // sets  as the SMTP server
            // $mail->Port       = 465;                   // set the SMTP port for the server
            // $mail->Username   = "xyz@gmail.com";  // username
            // $mail->Password   = "test121232";            // password

            $mail->SetFrom('hello@cortexstudio.in', 'Contact');

            $mail->Subject    = "Enquiry for tour and travels package";



            $mail->MsgHTML($body);

            $address = $address;
            $mail->AddAddress($address, $username);
            $mail->AddCC('hello@cortexstudio.in');

            if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
            echo "Message sent!";
            }
}

?>
