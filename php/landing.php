<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        // Redirect to the login section of the same page
        header("Location: ../main/landing.html#login");
        exit();
    } elseif (isset($_POST["register"])) {
        // Redirect to the registration section of the same page
        header("Location: ../main/landing.html#register");
        exit();
    }
}
?>
