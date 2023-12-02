<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: landing.html');
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Blood Record Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>Blood Record Management</h1>

    

    <div class="operation-box" id="create-box">
        <h2>Create Record</h2>
        <form action="../php/create.php" method="POST">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="age" placeholder="Age">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="blood_group" placeholder="Blood Group">
            <input type="text" name="mobile" placeholder="Mobile">
            <input type="text" name="address" placeholder="Address">
            <button type="submit">Create</button>
        </form>
    </div>

    <div class="message">
        <?php
        if (isset($_GET['message'])) {
            echo $_GET['message'];
        }
        ?>
    </div>
    <div class="operation-box" id="fetch-box">
        <h2>Fetch Data</h2>
        <form action="../php/fetch.php" method="POST">
            <label for="fetch_option">Select an option:</label>
            <select id="fetch_option" name="fetch_option">
                <option value="search">Search by Blood Group</option>
                <option value="all">See Whole Data</option>
            </select>
            <button type="submit">Fetch Data</button>
        </form>
    </div>

    <div class="operation-box" id="update-box">
        <h2>Update Record</h2>
        <form action="../php/update.php" method="POST">
            <input type="text" name="id" placeholder="ID to Update">
            <input type="text" name="new_name" placeholder="New Name">
            <input type="text" name="new_blood_group" placeholder="New Blood Group">
            <input type="text" name="new_mobile" placeholder="New Mobile">
            <button type="submit">Update</button>
        </form>
    </div>

    <div class="operation-box" id="delete-box">
        <h2>Delete Record</h2>
        <form action="../php/delete.php" method="POST">
            <input type="text" name="id" placeholder="ID to Delete">
            <button type="submit">Delete</button>
        </form>
    </div>

    <form action="../php/logout.php" method="post">
    <button type="submit" name="logout" class="logout-button">Logout</button>
</form>


    


   <script>
    document.querySelector('#delete-box form').addEventListener('submit', function (e) {
    e.preventDefault();
    if (confirm('Are you sure you want to delete this record?')) {
        this.submit();
    }
});

   </script>
</body>
</html>
