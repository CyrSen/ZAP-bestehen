<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = filter_var($_POST['_replyto'], FILTER_SANITIZE_EMAIL);
                $message = $_POST['message'];

                if (empty($name) || empty($email) || empty($message)) {
                    echo '<div class="alert alert-danger" role="alert">All fields are required. Please fill out the form completely.</div>';
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="alert alert-danger" role="alert">Invalid email address. Please enter a valid email.</div>';
                } else {
                    $to = 'gaudenz.raiber@gmail.com'; // Your email address
                    $subject = 'New Contact Form Submission';
                    $message = "Name: $name\nEmail: $email\nMessage:\n$message";
                    $headers = 'From: ' . $email;

                    if (mail($to, $subject, $message, $headers)) {
                        echo '<div class="alert alert-success" role="alert">Your message has been sent successfully!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Message delivery failed. Please try again later.</div>';
                    }
                }
            }
            ?>
            <p><a href="index.html" class="btn btn-primary">Back to Homepage</a></p>
        </div>
    </div>
</div>
</body>
</html>
