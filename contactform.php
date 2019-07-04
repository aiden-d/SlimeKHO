<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try{
        $mail -> SMTPDebug = 2;
        $mail ->isSMTP();
        $mail ->Host = 'smtp.googlemail.com';
        $mail ->SMTPAuth = true;
        $mail ->Username = 'slimekhomailer@gmail.com';
        $mail ->Password = 'slimekho';
        $mail ->SMTPSecure = 'tls';
        $mail ->Port = 587;

        //
        $mail ->setFrom('slimekhomailer@gmail.com', 'Aiden Dawes');
        $mail ->addAddress('aidendawes@gmail.com');
        $mail ->addReplyTo('aidendawes@gmail.com');

        $mail ->isHTML(true);
        $mail ->Subject = $subject;
        $mail ->Body = $message;

        $mail ->send();
        echo 'sent';

    } catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    header("Location: index.html");

}
?>
