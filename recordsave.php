<?php
// Include database connection file
include('connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (you can add more validation if needed)
    $contactName = $_POST['contactName'];
    $contactNumber = $_POST['contactNumber'];

    // Insert new record into the database
    $insertQuery = "INSERT INTO records (ContactName, ContactNumber) VALUES ('$contactName', '$contactNumber')";
    
    if ($conn->query($insertQuery) === TRUE) {
        // Record inserted successfully, redirect back to the page
        header("Location: index.php");
        exit();
    } else {
        // Handle errors if any
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

?>
