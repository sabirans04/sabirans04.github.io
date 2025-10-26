<?php

session_start();
header('Content-Type: application/json');

// Prevent direct access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Direct access not allowed']);
    exit;
}

// Rate limit — 1 request per two minute per IP
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SESSION['last_submit']) && time() - $_SESSION['last_submit'] < 120) {
    echo json_encode(['status' => 'error', 'message' => 'Wait a moment before retrying.']);
    exit;
}
$_SESSION['last_submit'] = time();

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php';

// Load SMTP config
if (!file_exists(__DIR__.'/config/smtp.php')) {
    echo json_encode(['status' => 'error', 'message' => 'SMTP config missing']);
    exit;
}
$config = require __DIR__ . '/config/smtp.php';

$name = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$message) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill all fields.']);
    exit;
}

$mail = new PHPMailer(true);

try {
    // --------------------------
    // Send email to recipient
    // --------------------------
    $mail->isSMTP();
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['encryption'];
    $mail->Port       = $config['port'];

    $mail->setFrom($config['from_email'], $config['from_name']);
    $mail->addAddress($config['recipient_email']);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "New contact form submission";
    $mail->Body    = "
        <strong>Name:</strong> {$name}<br>
        <strong>Email:</strong> {$email}<br><br>
        <strong>Message:</strong><br>
        " . nl2br(htmlspecialchars($message)) . "
    ";

    $mail->send();

    // --------------------------
    // Send confirmation email to user
    // --------------------------
    $mail->clearAllRecipients();
    $mail->addAddress($email);
    $mail->Subject = "Thank you for contacting us!";
    $mail->Body = "Hi {$name},<br><br>Thank you for contacting us. We'll get in touch with you as soon as possible.<br><br>Best regards,<br>Your Company";

    $mail->send();

    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message.']);
}
