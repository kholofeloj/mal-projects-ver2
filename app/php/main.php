<?php

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $contactNumber = htmlspecialchars($_POST['contactNumber']);
    $mailFrom = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mailTo = "info@janmckkreatives.co.za"; 
    $subject = "New message from: " . $name;
    
    // HTML email body
    $txt = "<strong>You have received a message from: </strong>" . $name . "<br><br>";
    $txt .= "<strong>Email: </strong>" . $mailFrom . "<br>";
    $txt .= "<strong>Contact Number: </strong>" . $contactNumber . "<br>";
    $txt .= "<strong>Message: </strong><br>" . nl2br($message); // Convert newlines to <br>

    // Email headers
    $headers = "From: " . $mailFrom . "\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Send email and handle result
    if (mail($mailTo, $subject, $txt, $headers)) {
        header("Location: ../../malp.html?mailsend");  // Redirect with success message
        exit();  // Prevent further script execution
    } else {
        echo "Error: Unable to send email.";
    }
}

?>