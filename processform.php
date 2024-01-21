<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZAP bestehen</title>
    <link rel="icon" type="image/x-icon" href=".//zap_favicon_03.png">
    <meta name="google-site-verification" content="cQOkJTMCVDrvuJH5ZXIVxSmwqEHW8lWgSpWbmZLPK1g" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&amp;display=swap"/>
    </noscript>
    <link href="css/bootstrap.min.css?ver=1.2.0" rel="stylesheet">
    <link href="./css/main.css" rel="stylesheet">
    <!-- Include Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4 text-center">
            <img
            src="images/1-hero-image.jpg"
            class="mb-5"
            alt="Your Logo"
            style="width: 300px; height: auto"/>

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
                        $to = 'cvsenger@gmail.com'; // Your email address
                        $subject = 'ZAP-Formular';
                        $message = "Name: $name\nEmail: $email\nMessage:\n$message";
                        $headers = 'From: ' . $email;

                        if (mail($to, $subject, $message, $headers)) {
                            echo '<div class="alert alert-info" role="alert">Vielen Dank. Wir melden uns in Kürze.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Message delivery failed. Please try again later.</div>';
                        }
                    }
                }
                ?>

                <div class="row justify-content-center">
                    <div class="col-4 text-center">
                        <a href="index.html" class="btn btn-primary">Zurück</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <img src="images/zap-bestehen-qr.png" class="img-fluid mt-3" alt="qr-code">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>