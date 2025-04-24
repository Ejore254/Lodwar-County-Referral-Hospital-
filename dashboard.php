<?php
session_start();
if (!isset($_SESSION['staff'])) {
    header("Location: login.php");
    exit();
}
require 'db.php';
?>

<h2>Welcome, <?php echo $_SESSION['staff']; ?></h2>

<h3>Appointments</h3>
<table border="1">
    <tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM appointments");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['subject']}</td>
            <td>{$row['message']}</td>
        </tr>";
    }
    ?>
</table>
