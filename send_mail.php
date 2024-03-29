<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Fetch data from POST request
$postData = json_decode(file_get_contents("php://input"));

// Extract data from JSON
$name = $postData->name;
$phoneNumber = $postData->phoneNumber;
$email = $postData->email;
$city = $postData->city;
$selectedRadio = $postData->selectedRadio;
$selectedValueGroup1 = $postData->selectedValueGroup1;


require 'vendor/autoload.php'; // Path to PHPMailer autoload file

// Create a new PHPMailer instance
$mail = new PHPMailer(true);


try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'leadsfromdc@gmail.com'; // SMTP username
    $mail->Password = 'gkrw qbvb clnf idjd'; // SMTP password
    $mail->SMTPSecure = "PHPMailer::ENCRYPTION_SMTPS"; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
    // Recipients
    $mail->setFrom('leadsfromdc@gmail.com', ' D2C');
    $mail->addAddress('rynchaudhary@gmail.com', 'Ryc'); // Add a recipient

    // $mail->addReplyTo('your_email@example.com', 'Your Name');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Leads from d2c';
    $mail->Body = "<b>Name:</b> $name<br>";
    $mail->Body .= "<b>Phone Number:</b> $phoneNumber<br>";
    $mail->Body .= "<b>Email:</b> $email<br>";
    $mail->Body .= "<b>City:</b> $city<br>";
    $mail->Body .= "<b>Selected Radio:</b> $selectedRadio<br>";
    $mail->Body .= "<b>Selected Value Group 1:</b> $selectedValueGroup1<br>";



    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>