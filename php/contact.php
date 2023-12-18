<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["comments"]);


    // Basic validation (you should enhance this based on your needs)
    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input or all fields are required";
        exit;
    }

    // Construct the email message
    $to = "billyoungl777.bl@gmail.com";  // Replace with your email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $emailMessage = "
        <html>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send the email
    if (mail($to, $subject, $emailMessage, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Error sending email. Details: " . print_r(error_get_last(), true);
    }
}
