<?php
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $sql = "INSERT INTO blood_records (name, age, email, blood_group, mobile, address) VALUES ('$name', '$age', '$email', '$blood_group', '$mobile', '$address')";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: ../main/index.php");
       
    } else {
        header("Location: ../main/index.php");
    }
}

$conn->close();
?>
