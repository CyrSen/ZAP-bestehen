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
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $to = 'gaudenz.raiber@gmail.com'; // Your email address
                    $subject = 'New Email Subscription';
                    $message = 'New email subscription: ' . $email;
                    $headers = 'From: ' . $email;

                    if (mail($to, $subject, $message, $headers)) {
                        echo '<div class="alert alert-success" role="alert">Thank you for subscribing!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Subscription failed. Please try again later.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Invalid email address. Please enter a valid email.</div>';
                }
            }
            ?>
            <p><a href="index.html" class="btn btn-primary">Back to Homepage</a></p>
        </div>
    </div>
</div>
</body>
</html>

