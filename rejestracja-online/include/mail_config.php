<?

require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendCustomEmail($to, $subject, $body, $altBody = '') {
    $mail = new PHPMailer(true);

    require_once '../db_connect.php';
	require_once '../config.php';	

	$ownerLogin = OWNER_LOGIN;

	$smtp_server = SMTP_SERVER;
	$smtp_auth = SMTP_AUTH;
	$smtp_port = SMTP_PORT;
	$smtp_email = SMTP_EMAIL;
	$smtp_pass = SMTP_PASS; 
	$email_from = SMTP_EMAIL_FROM;

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = $smtp_server;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_email;
        $mail->Password   = $smtp_pass;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = $smtp_port;
        $mail->CharSet = 'UTF-8'; // Set the character encoding to UTF-8
        //Recipients
        $mail->setFrom($smtp_email, $email_from);
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        return true;
    } catch (Exception $e) {
        // You can log or return an error message here
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>