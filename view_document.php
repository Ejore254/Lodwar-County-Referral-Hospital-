<?php
$host = 'localhost';
$dbname = 'lcrh-website';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $doc_id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT name, file_path FROM documents WHERE id = :id");
    $stmt->bindParam(':id', $doc_id, PDO::PARAM_INT);
    $stmt->execute();
    $document = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($document) {
        $file_path = $document['file_path'];
        $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

        if (file_exists($file_path)) {
            if ($file_extension === 'pdf') {
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . $document['name'] . '.' . $file_extension . '"');
                header('Content-Length: ' . filesize($file_path));
                readfile($file_path);
                exit;
            } elseif ($file_extension === 'doc' || $file_extension === 'docx') {
                // Browsers don't typically render DOC/DOCX directly.
                // You would usually force a download.
                header('Content-Type: application/msword');
                header('Content-Disposition: attachment; filename="' . $document['name'] . '.' . $file_extension . '"');
                header('Content-Length: ' . filesize($file_path));
                readfile($file_path);
                exit;
            } else {
                echo "Unsupported file type.";
            }
        } else {
            echo "File not found.";
        }
    } else {
        echo "Document not found in the database.";
    }
} else {
    echo "Invalid document ID.";
}
?>