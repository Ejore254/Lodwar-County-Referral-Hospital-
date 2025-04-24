<?php
$host = 'localhost';
$user = 'root';       // default XAMPP user
$password = '';       // default is empty in XAMPP
$dbname = 'lcrh-website';  // replace this with your actual database name

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

