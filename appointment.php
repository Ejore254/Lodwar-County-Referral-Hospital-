<?php

include('db.php');
// backend/appointment.php

// Database connection details
$servername = "localhost"; // Replace with your database server name if different
$username = "root";      // Replace with your database username
$password = "";          // Replace with your database password
$dbname = "lcrh-website"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = isset($_POST["phone"]) ? mysqli_real_escape_string($conn, $_POST["phone"]) : "";
    $subject = isset($_POST["subject"]) ? mysqli_real_escape_string($conn, $_POST["subject"]) : "";
    $message = isset($_POST["message"]) ? mysqli_real_escape_string($conn, $_POST["message"]) : "";

    // SQL query to insert data
    $sql = "INSERT INTO appointments (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment request submitted successfully!";
        // You can redirect the user to a thank you page here:
        // header("Location: thank_you.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
