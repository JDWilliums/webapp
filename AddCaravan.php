<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Caravan Details</title>
    <link rel="stylesheet" href="AddCaravan.css">
</head>
<body>
<div class="background-box">
    <div class="container">
        <div class="white-box">
            <h1>Add Caravan Details</h1>
        </div>

        
        <div class="navigation-buttons">
            <a href="homepage.php"><button type="button">Back to Homepage</button></a>
            <a href="ListOfCaravans.php"><button type="button">Back to Listings</button></a>

            <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<a href="logout.php"><button type ="button">Logout</button></a>';
                } else {
                    echo '<a href="login.php"><button type="button">Login</button></a>';
                }
            ?>

            
        </div>
        <form action="" method="post">
            <div class="name-box">
                <p>Caravan Name</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="name" placeholder="Type here..." required>
            </div>
            <div class="name-box">
                <p>Description:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="description" placeholder="Type here..." required>
            </div>
            <div class="name-box">
                <p>Location:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="location" placeholder="Type here..." required>
            </div>
            <div class="name-box">
                <p>Price per Night:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="pricepernight" placeholder="Type here..." required>
            </div>
            <div class="name-box">
                <p>Availability:</p>
            </div>
            <div class="input-container">
                <input type="date" class="caravan-input" name="availabilityStart" placeholder="Start date...">
                <input type="date" class="caravan-input" name="availabilityEnd" placeholder="End date...">
            </div>
            <div class="name-box">
                <p>Image Upload:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="image_url" placeholder="Upload image URL...">
            </div>
            <div class="name-box">
                <p>Video Upload:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="video_url" placeholder="Upload video URL...">
            </div>
            <div class="name-box">
                <p>Facilities/Amenities:</p>
            </div>
            <div class="input-container">
                <textarea class="caravan-textarea" name="amenities" placeholder="List facilities/amenities here..."></textarea>
            </div>
            <div class="name-box">
                <p>Additional Notes:</p>
            </div>
            <div class="input-container">
                <input type="text" class="caravan-input" name="notes" placeholder="Add any additional notes...">
            </div>
            <div class="submit-button">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        
    </div>
</div>
<?php


if(isset($_POST["submit"])){
    // Retrieve form data
    $name = $_POST["name"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $pricepernight = $_POST["pricepernight"];
    $availabilityStart = $_POST["availabilityStart"];
    $availabilityEnd = $_POST["availabilityStart"];
    $image_url = $_POST["image_url"];
    $video_url = $_POST["video_url"];
    $amenities = $_POST["amenities"];
    $notes = $_POST["notes"];

    // Retrieve the user ID of the user
    $user_id = $_SESSION['user_id'];

    // Insert into database
    $query = "INSERT INTO caravan_details (user_id, name, description, location, pricepernight, availabilityStart, availabilityEnd, image_url, video_url, amenities, notes)
              VALUES ('$user_id', '$name', '$description', '$location', '$pricepernight', '$availabilityStart', '$availabilityEnd', '$image_url', '$video_url', '$amenities', '$notes')";
    
    if(mysqli_query($conn, $query)){
        echo '<script>alert("Caravan details added successfully!")</script>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

</body>
</html>
