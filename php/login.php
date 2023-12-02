<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Query the database to retrieve user data based on the provided email
    $db = new PDO("mysql:host=localhost;dbname=bloodrecord", "root", "");
    $query = "SELECT id, email, password FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    
    if ($stmt->execute()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user["password"])) {
            // Password is correct; user is authenticated
            $_SESSION["user_id"] = $user["id"];
            
            // Redirect to the protected page (e.g., your blood management system)
            header("Location: ../main/index.php");
        } else {
            // Incorrect email or password
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "Login failed. Please try again.";
    }
}
?>

