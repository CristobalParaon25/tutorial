<?php
// Include database connection file
include('connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (you can add more validation if needed)
    $editRecordId = $_POST['editRecordId'];
    $editContactName = $_POST['editContactName'];
    $editContactNumber = $_POST['editContactNumber'];

    // Update the record in the database
    $updateQuery = "UPDATE records SET ContactName='$editContactName', ContactNumber='$editContactNumber' WHERE ID='$editRecordId'";
    
    if ($conn->query($updateQuery) === TRUE) {
        // Record updated successfully, redirect back to index.php
        header("Location: index.php");
        exit();
    } else {
        // Handle errors if any
        echo "Error: " . $updateQuery . "<br>" . $conn->error;
    }
}
?>
