<?php
// Include database connection file
include('connection.php');

// Check if ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = $_GET['id'];

    // Delete the record from the database
    $deleteQuery = "DELETE FROM records WHERE ID = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        // Record deleted successfully, redirect back to index.php
        header("Location: index.php");
        exit();
    } else {
        // Handle errors if any
        echo "Error: " . $deleteQuery . "<br>" . $conn->error;
    }
} else {
    // If ID parameter is not set, redirect back to index.php or display an error message
    header("Location: index.php");
    exit();
}
?>
