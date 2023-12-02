<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $new_name = $_POST['new_name'];
    $new_blood_group = $_POST['new_blood_group'];
    $new_mobile = $_POST['new_mobile'];

    $sql = "UPDATE blood_records SET name='$new_name', blood_group='$new_blood_group', mobile='$new_mobile' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../main/index.php?message=Record updated successfully");
    } else {
        header("Location: ..main/index.PHP?message=Error: " . $conn->error);
    }
}

$conn->close();
?>
