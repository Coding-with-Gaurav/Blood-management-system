<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM blood_records WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Record deleted successfully");
    } else {
        header("Location: index.php?message=Error: " . $conn->error);
    }
}

$conn->close();
?>
