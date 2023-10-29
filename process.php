<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'gaudenz.raiber@gmail.com'; // Your email address
        $subject = 'New Email Subscription';
        $message = 'New email subscription: ' . $email;
        $headers = 'From: ' . $email;
        
        if (mail($to, $subject, $message, $headers)) {
            echo 'Thank you for subscribing!';
        } else {
            echo 'Subscription failed. Please try again later.';
        }
    } else {
        echo 'Invalid email address. Please enter a valid email.';
    }
}
?>
