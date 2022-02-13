<?php
    include "PHPMailer.php";
    include "SMTP.php";

    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->Host = 'smtp.naver.com';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->Username = 'choonghyun95';
    $mail->Password = 'ch656895!';
    $mail->setFrom('novamarket@example.com', '노바마켓');
    $mail->addReplyTo('novamarket@example.com', '노바마켓');
    $mail->addAddress('choonghyun95@naver.com', '노바마켓팀원');
    $mail->Subject = '메일 테스트입니다.';
    $mail->AltBody = '인증 테스트입니당';
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
    
?>