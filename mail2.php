<?php
 require 'PHPMailer/PHPMailerAutoload.php';
$sub="Feed the Foodie alert....!!!!!!";
$to="santhanu4u@gmail.com";
$msg="A new hotel has registered.......log into santhanu.comli.com";
                    $mail = new PHPMailer;

                    $mail->isSMTP();                                   // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                            // Enable SMTP authentication
                    $mail->Username = 'feedthefoodie007@gmail.com';          // SMTP username
                    $mail->Password = 'feedthefoodie123'; // SMTP password
                    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;    
					$mail->Debug=1;                             // TCP port to connect to

                    $mail->setFrom('feedthefoodie007@gmail.com', $sub);
                    $mail->addReplyTo('feedthefoodie007@gmail.com', $sub);
                    $mail->addAddress($to);   // Add a recipient
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    $mail->isHTML(true);  // Set email format to HTML

                    $bodyContent = '<h1>How to Send Email usin PHP in Localhost by CodexWorld</h1>';
                    $bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

                    $mail->Subject = 'Email from feed the foodie ';
                    $mail->Body    = $msg;
                    if(!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
?>
    <script>
window.location="index.php";

</script>
<?php

                       } else {
                                     
?>
    <script>
window.location="index.php";

</script>
<?php
;

                              }


          
    ?>