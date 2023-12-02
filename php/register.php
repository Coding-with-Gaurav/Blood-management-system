<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Hash the password for security (use a strong hashing algorithm like bcrypt)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insert user data into the database (you'll need to establish a database connection)
    $db = new PDO("mysql:host=localhost;dbname=bloodrecord", "root", "");
    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: ../main/landing.html");
    } else {
        // Registration failed, display an error message
        echo "Registration failed. Email ID already Exist.";
    }
}
?>


