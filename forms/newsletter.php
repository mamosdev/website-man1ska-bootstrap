<?php

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'hatma.rosyid@gmail.com';

// Extract email from form (assuming POST method and key "email")
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;

// Validate email address
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Invalid email address. Please enter a valid email.';
  exit;
}

$subject = "New Subscription: " . $email;
$message = "A new subscriber has joined: " . $email;

$headers = "From: $email \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8 \r\n";

// Send email and handle potential errors
if (mail($receiving_email_address, $subject, $message, $headers)) {
  echo 'Subscription Successful!';
} else {
  $error = error_get_last();
  echo 'Error sending subscription. Please try again later. (' . $error['message'] . ')';
}
?>