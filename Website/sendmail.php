<?php
    session_start();
?>

<?php
    require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer

    $username = $_POST['email'];
    $password = $_POST['password'];
    $comments = $_POST['comments'];
    $subject = $_POST['subject'];
    $emailTo = 'studentsassistancemailer@gmail.com';
    $mail = new PHPMailer(); #create a new instance
    $mail->isSMTP(); #using SMTP
    $mail->isHtml(true);
    $mail->Host = 'smtp.office365.com';
    #$mail->SMTPDebug = 2; #include client and server messges
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->Body = $comments;
    $mail->Subject = $subject;
    $mail->From = $username; #sender
    $mail->AddAddress($emailTo); #recepient
    
    if (!$mail->Send()) #sending the email
    {
        echo "Message was not sent";
        echo "Mailer Error: ". $mail->ErrorInfo;
    }
    else
        echo "<script>window.location.href='contact.php';alert('Your e-mail was sent, thank you for your feedback.');</script>";
?>