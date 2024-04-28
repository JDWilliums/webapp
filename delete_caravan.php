<?php
require_once 'config.php';

// Check if the caravan ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $caravanId = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM caravan_details WHERE id = '$caravanId'";
    
    // Execute the delete query
    if(mysqli_query($conn, $query)) {
        // Deletion successful
        header("Location: listofcaravans.php");
        exit();
    } else {
        // display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If caravan ID is not provided
    header("Location: listofcaravans.php");
    exit();
}


mysqli_close($conn);
?>
