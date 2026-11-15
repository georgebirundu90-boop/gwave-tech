
<?php

// Connect to the database
require_once "includes/db.php";

// Only accept POST submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the submitted form data
    $full_name = trim($_POST["full_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Validate the submitted information
    if (
        $full_name === "" ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        $subject === "" ||
        $message === ""
    ) {
        die("Please provide valid information in all fields.");
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (full_name, email, subject, message)
         VALUES (?, ?, ?, ?)"
    );

    // Insert the message safely
    $stmt->bind_param("ssss", $full_name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "<h2>Thank you, " . htmlspecialchars($full_name) . "!</h2>";
        echo "<p>Your message has been received successfully.</p>";
        echo '<a href="contact.html">Return to Contact Us</a>';
    } else {
        echo "Sorry, your message could not be saved. Please try again.";
    }

    $stmt->close();

} else {
    echo "Invalid request.";
}

$conn->close();

?>
