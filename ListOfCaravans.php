<?php

// Include the database connection file
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Caravans</title>
    <link rel="stylesheet" type="text/css" href="ListOfCaravans.css">
</head>
<body>

<div class="textbox">
    <p>Available Caravans</p>
    <div class="top-buttons">
        <button class="home-button" onclick="location.href='homepage.php'">Homepage</button>
        <?php
        // Check if the user is logged in
        if(isset($_SESSION['user_id'])) {
            // If logged in, show "Add Your Own Caravan" button
            echo '<button class="add-caravan-button" onclick="location.href=\'addcaravan.php\'">Add Your Own Caravan</button>';
        }
        ?>
    </div>
    <div class="logout">
        <?php
        if(isset($_SESSION['user_id'])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
    </div>
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-bar" id="searchBar">
        <button type="button" class="search-button">Search</button>
    </div>
</div>
<script>
    // Javascript code for search bar functionality

    document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('searchBar');
    const containers = document.querySelectorAll('.container'); // Select all caravan containers
    
    searchBar.addEventListener('input', function() {
        const searchValue = searchBar.value.toLowerCase();
        
        containers.forEach(container => {
            const title = container.querySelector('.title').textContent.toLowerCase();
            if (title.includes(searchValue)) {
                container.style.display = ''; // Keep the original display style
            } else {
                container.style.display = 'none';
            }
        });
    });
});

function confirmDelete(caravanId) {
    var result = confirm("Are you sure you want to delete this caravan?");
    if (result) {
        // If user confirms, redirect to a PHP script to delete the caravan from the database
        window.location.href = 'delete_caravan.php?id=' + caravanId;
    }
}

</script>

<?php
// Fetch caravan details from the database
$query = "SELECT * FROM caravan_details";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the caravan details
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the logged-in user owns this caravan
        echo '<div class="container">';
            echo '<div class="grey-box">';
            echo '<p class="title">' . $row['name'] . '</p>';
            echo '<div class="inner-grey-box"></div>';
            echo '<p class="details">Location: ' . $row['location'] . '</p>';
            echo '<p class="details">Price per Night: £' . $row['pricepernight'] . '</p>';
            echo '<p class="details">Availability: ' . $row['availabilityStart'] . ' - ' . $row['availabilityEnd'] . '</p>';
            echo '<div class="button-container">';
            echo '<button class="view-button" onclick="location.href=\'viewcaravan.php?id=' . $row['id'] . '\'">View</button>';

        if (isset($_SESSION['user_id']) && $row['user_id'] == $_SESSION['user_id']) {
            // Display the caravan details and buttons
            
            echo '<button class="edit-button" onclick="location.href=\'editcaravan.php?id=' . $row['id'] . '\'">Edit</button>';
            echo '<button class="delete-button" onclick="confirmDelete(' . $row['id'] . ')">Delete</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            // If the user does not own this caravan
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
} else {
    // If no caravans are available, display a message
    echo '<p>No caravans available at the moment.</p>';
}

// Close the database connection
mysqli_close($conn);
?>


</body>
</html>
