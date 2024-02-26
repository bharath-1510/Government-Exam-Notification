<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Government Examination Notification Registration</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>

<h2>Government Examination Notification Registration</h2>

<form id="registrationForm" action="register.php" method="POST">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <button type="submit">Register</button>
</form>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // Here, you would typically save the email to a database
    // and send a confirmation email to the user
    
    // For demonstration, let's just send a simple email
    $to = $email;
    $subject = "Registration Confirmation";
    $message = "You have successfully registered for government examination notifications.";
    $headers = "From: your_email@example.com" . "\r\n";

    // Send the email
    mail($to, $subject, $message, $headers);

    // Redirect back to the registration page
    header("Location: index.html");
    exit();
}
?>
