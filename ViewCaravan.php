<?php
require_once 'config.php';

// Check if ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Get the caravan ID from the URL
    $caravan_id = $_GET['id'];
    
    $query = "SELECT * FROM caravan_details WHERE id = $caravan_id";
    $result = mysqli_query($conn, $query);
    
    // Check if a caravan with the provided ID exists
    if(mysqli_num_rows($result) > 0) {
        // Fetch the details of the caravan
        $caravan = mysqli_fetch_assoc($result);
        
        // Extract the details for displaying on the page
        $name = $caravan['name'];
        $description = $caravan['description'];
        $location = $caravan['location'];
        $pricepernight = $caravan['pricepernight'];
        $availabilityStart = $caravan['availabilityStart'];
        $availabilityEnd = $caravan['availabilityEnd'];
        $image_url = $caravan['image_url'];
        $video_url = $caravan['video_url'];
        $amenities = $caravan['amenities'];
        $notes = $caravan['notes'];
    } else {
        echo "Caravan not found.";
        exit();
    }
} else {
    // ID parameter is not provided in the URL
    echo "Caravan ID not specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Caravan Details</title>
    <link rel="stylesheet" type="text/css" href="viewcaravan.css">
</head>
<body>

<div class="container">
    <h1>Caravan Details</h1>

    <div class="navigation-buttons">
        <a href="homepage.php"><button type="button">Back to Homepage</button></a>
        <a href="ListOfCaravans.php"><button type="button">Back to Listings</button></a>
    </div>

    <div class="caravan-details">
        <h2><?php echo $name; ?></h2>
        <p><strong>Description:</strong> <?php echo $description; ?></p>
        <p><strong>Location:</strong> <?php echo $location; ?></p>
        <p><strong>Price per Night:</strong> £<?php echo $pricepernight; ?></p>
        <p><strong>Availability:</strong> <?php echo $availabilityStart . ' - ' . $availabilityEnd; ?></p>
        <p><strong>Images:</strong> <?php echo $image_url; ?></p>
        <p><strong>Video:</strong> <?php echo $video_url; ?></p>
        <p><strong>Facilities/Amenities:</strong> <?php echo $amenities; ?></p>
        <p><strong>Additional Notes:</strong> <?php echo $notes; ?></p>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
