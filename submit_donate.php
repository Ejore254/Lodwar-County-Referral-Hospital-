<?php
// backend/donate.php
include('db.php');  // Make sure db.php contains your PDO connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize & collect input
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $donation_type = $_POST['donation_type'] ?? '';
    $description = $_POST['description'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        $stmt = $conn->prepare("INSERT INTO donations (fullname, email, phone, donation_type, description, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phone, $donation_type, $description, $message]);

        // Success feedback
        echo "<h2>Thank you, $fullname!</h2>";
        echo "<p>Your donation has been submitted successfully. We appreciate your support for Lodwar County Referral Hospital.</p>";
        echo "<p><a href='../index.php'>Return to Home</a></p>";

    } catch (PDOException $e) {
        echo "Error saving your donation: " . $e->getMessage();
    }

} else {
    echo "Invalid request.";
}
?>
