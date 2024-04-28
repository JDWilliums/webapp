<?php
require_once 'config.php';

// Check if ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Get the caravan ID from the URL
    $caravan_id = $_GET['id'];
    
    // Fetch the caravan details from the database based on the ID
    $query = "SELECT * FROM caravan_details WHERE id = $caravan_id";
    $result = mysqli_query($conn, $query);
    
    // Check if a caravan with the provided ID exists
    if(mysqli_num_rows($result) > 0) {
        // Fetch the details of the caravan
        $caravan = mysqli_fetch_assoc($result);
        
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
    echo "Caravan ID not specified.";
    exit();
}

// Check if the form is submitted
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $pricepernight = $_POST["pricepernight"];
    $availabilityStart = $_POST["availabilityStart"];
    $availabilityEnd = $_POST["availabilityEnd"];
    $image_url = $_POST["image_url"];
    $video_url = $_POST["video_url"];
    $amenities = $_POST["amenities"];
    $notes = $_POST["notes"];

    // sql query stuff
    $query = "UPDATE caravan_details SET 
              name = '$name', 
              description = '$description', 
              location = '$location', 
              pricepernight = '$pricepernight', 
              availabilityStart = '$availabilityStart', 
              availabilityEnd = '$availabilityEnd', 
              image_url = '$image_url', 
              video_url = '$video_url', 
              amenities = '$amenities', 
              notes = '$notes' 
              WHERE id = $caravan_id";
    
    if(mysqli_query($conn, $query)){
        // Caravan details updated successfully
        echo '<script>alert("Caravan details updated successfully!")</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Caravan Details</title>
    <link rel="stylesheet" href="AddCaravan.css">
</head>
<body>

<div class="background-box">
    <div class="container">
        <div class="white-box">
            <h1>Edit Caravan Details</h1>
        </div>
        <div class="navigation-buttons">
            <a href="homepage.html"><button type="button">Back to Homepage</button></a>
            <a href="ListOfCaravans.php"><button type="button">Back to Listings</button></a>
        </div>
        <form action="" method="post">
            <div class="name-box">
                <p>Caravan Name</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="name" placeholder="Type here..." value="<?php echo $name; ?>" required>
            </div>
            <div class="name-box">
                <p>Description</p>
            </div>
            <div class="input-container">
                <textarea class="caravan-textarea" name="description" placeholder="Type here..." required><?php echo $description; ?></textarea>
            </div>
            <div class="name-box">
                <p>Location</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="location" placeholder="Type here..." value="<?php echo $location; ?>" required>
            </div>
            <div class="name-box">
                <p>Price per Night (£)</p>
            </div>
            <div class="input-container">
                <input type="number" class="caravan-input" name="pricepernight" placeholder="Type here..." value="<?php echo $pricepernight; ?>" required>
            </div>
            <div class="name-box">
                <p>Availability Start Date</p>
            </div>
            <div class="input-container">
                <input type="date" class="caravan-input" name="availabilityStart" value="<?php echo $availabilityStart; ?>" >
            </div>
            <div class="name-box">
                <p>Availability End Date</p>
            </div>
            <div class="input-container">
                <input type="date" class="caravan-input" name="availabilityEnd" value="<?php echo $availabilityEnd; ?>" >
            </div>
            <div class="name-box">
                <p>Image URL</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="image_url" placeholder="Type here..." value="<?php echo $image_url; ?>">
            </div>
            <div class="name-box">
                <p>Video URL</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="video_url" placeholder="Type here..." value="<?php echo $video_url; ?>">
            </div>
            <div class="name-box">
                <p>Amenities</p>
            </div>
            <div class="input-container">
                <textarea class="caravan-textarea" name="amenities" placeholder="Type here..."><?php echo $amenities; ?></textarea>
            </div>
            <div class="name-box">
                <p>Notes</p>
            </div>
            <div class="input-container">
                <textarea class="caravan-textarea" name="notes" placeholder="Type here..."><?php echo $notes; ?></textarea>
            </div>
            <div class="submit-button">
                <button type="submit" name="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
