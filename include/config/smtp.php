<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Direct access not allowed']);
    exit;
}

return [
    'host' => 'mail.example.com', // Replace with your SMTP server
    'username' => 'contact@example.com', // SMTP username
    'password' => '12345@67890', // SMTP password
    'encryption' => 'ssl', // Encryption: 'ssl' or 'tls'
    'port' => 465, // SMTP port

    'from_email' => 'contact@example.com', // Sender email address
    'recipient_email' => 'your_email@example.com', // Recipient email address
    'from_name' => 'Contact Form',
];
