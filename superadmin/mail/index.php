<?php

    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP(); //if using localhost need to enable this line

    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    $mail->Username='official.zirconium@gmail.com';
    $mail->Password='sayaSukaAwak123';

    $mail->setFrom('official.zirconium@gmail.com','Zirconium');
    $mail->addAddress('danielyusoff08@gmail.com');
    $mail->addReplyTo('official.zirconium@gmail.com');

    $mail->isHTML(true);
    $mail->Subject='PHP Mailer Subject';
    $mail->Body='<h1 align=center>Success</h1><br><h4 align=center>Thank god lito is awesome!</h4>';

    if(!$mail->send())
    {
        echo "Message could not be sent!";
    }
    else
    {
        echo "Message has been sent!";
    }

?>