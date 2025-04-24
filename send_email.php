<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set the email details
    $to = "your-email@example.com"; // Replace with your email
    $subject = "New Message from LCRH Website Contact Form";
    $body = "You have a new message from $name ($email):\n\n$message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message. We will get back to you soon.";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
