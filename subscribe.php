<?php
include('db.php');
// Database connection details
$servername = "localhost"; // Replace with your database server name
$username = "root";     // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "lcrh-website"; // Replace with your database name

try {
    // Create a PDO connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the email field was submitted and is not empty
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize the email

        // Prepare an SQL statement to insert the email into the subscribers table
        $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);

        // Execute the prepared statement
        $stmt->execute();

        // Optionally, you can send a success message back to the user
        echo "Thank you for subscribing!";
        // You might also want to redirect the user back to the form page
        // header("Location: your_form_page.html?success=true");
        // exit();

    } else {
        // Handle the case where the email field is missing or empty
        echo "Please enter a valid email address.";
        // Optionally, redirect back with an error message
        // header("Location: your_form_page.html?error=empty_email");
        // exit();
    }

} catch(PDOException $e) {
    // Handle database connection errors or query errors
    echo "Error: " . $e->getMessage();
    // You might want to log this error for debugging
}

// Close the database connection
$conn = null;
?>