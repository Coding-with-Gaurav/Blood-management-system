<link rel="stylesheet" type="text/css" href="../css/style1.css">

<?php

// Include your database connection file here
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fetch_option'])) {
        $fetch_option = $_POST['fetch_option'];

        if ($fetch_option === 'search') {
            // Display the blood group input form
            echo '<div class="operation-box">';
            echo '<h2>Search by Blood Group</h2>';
            echo '<form action="fetch.php" method="POST">';
            echo '<input type="text" name="blood_group" placeholder="Enter Blood Group">';
            echo '<button type="submit">Search</button>';
            echo '</form>';
            echo '</div>';
        } elseif ($fetch_option === 'all') {
            // Handle displaying the entire data
            $sql = "SELECT * FROM blood_records";

            // Prepare the SQL statement
            $stmt = $pdo->prepare($sql);

            // Execute the query
            $stmt->execute();

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($records) === 0) {
                // No records found
                echo '<div class="operation-box">';
                echo '<h2>No Records Found</h2>';
                echo '<p>There are no records in the database.</p>';
                echo '</div>';
            } else {
                // Fetch and display the results
                echo '<div class="operation-box">';
                echo '<h2>All Records</h2>';
                echo '<table>';
                echo '<tr><th></th><th>Name</th><th>Age</th><th>Email</th><th>Blood Group</th><th>Mobile</th><th>Address</th></tr>';

                foreach ($records as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['blood_group'] . '</td>';
                    echo '<td>' . $row['mobile'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
                echo '</div>';
            }
        } else {
            // Handle other options or display an error message
            echo '<div class="operation-box">';
            echo '<h2>Error</h2>';
            echo '<p>Invalid option selected.</p>';
            echo '</div>';
        }
    } elseif (isset($_POST['blood_group'])) {
        // Handle the search by blood group
        $blood_group = $_POST['blood_group'];

        // SQL query to retrieve records based on the provided blood group
        $sql = "SELECT * FROM blood_records WHERE blood_group = :blood_group";

        // Prepare the SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':blood_group', $blood_group, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($records) === 0) {
            // No records found
            echo '<div class="operation-box">';
            echo '<h2>No Records Found</h2>';
            echo '<p>There are no records matching the provided blood group.</p>';
            echo '</div>';
        } else {
            // Fetch and display the results
            echo '<div class="operation-box">';
            echo '<h2> Results for Blood Group: ' . $blood_group . '</h2>';
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Mobile</th><th>Address</th></tr>';

            foreach ($records as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['mobile'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
        }
    }
}
?>
