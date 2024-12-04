<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and validate
    $first_name = htmlspecialchars($_POST['first_name']);
    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['body']);
    $user_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // Assuming there's an email field in your form

    if ($first_name && $subject && $body && $user_email) {
        // Email settings
        $to = "bloria@bloria.com";  // Replace with your email address
        $headers = "From: no-reply@bloria.com\r\n";
        $headers .= "Reply-To: $user_email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Email subject and body
        $email_subject = "New Contact Form Submission: $subject";
        $email_body = "
            <html>
            <head>
                <title>Contact Form Submission</title>
            </head>
            <body>
                <h2>Contact Form Submission</h2>
                <p><strong>First Name:</strong> $first_name</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$body</p>
            </body>
            </html>
        ";

        // Send email
        if (mail($to, $email_subject, $email_body, $headers)) {
            header("Location: contact.html?success=1");
            exit();
        } else {
            echo "Failed to send message. Please try again.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request.";
}
?>