<?php
// Include the database connection file
require_once 'config.php';

// Check if the caravan ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $caravanId = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare a delete query
    $query = "DELETE FROM caravan_details WHERE id = '$caravanId'";
    
    // Execute the delete query
    if(mysqli_query($conn, $query)) {
        // Deletion successful, redirect to the list of caravans page
        header("Location: listofcaravans.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If caravan ID is not provided, redirect back to the list of caravans page
    header("Location: listofcaravans.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
