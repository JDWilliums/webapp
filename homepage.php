<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentMyCaravan.io</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="border-container">
        <div class="container">
            <div class="rectangle" id="rectangle1">
                <div class="links">
                    <a href="about.html">About</a>
					<a href="ListOfCaravans.php">List</a>
					<div>
                        <?php
                        if(isset($_SESSION['user_id'])) {
                            echo '<a href="logout.php">Logout</a>';
                        } else {
                            echo '<a href="login.php">Login</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="image-box">
                    <p>RentMyCaravan.io</p>
                </div>
            </div>
            <div class="rectangle" id="rectangle2">
                <div class="horizontal-box">
                    <p>User134: Beautiful getaway, would take the family again!</p>
                </div>
                <div class="horizontal-box">
                    <p>User421: Beautiful views and very affordable!</p>
                </div>
                <div class="horizontal-box">
                    <p>User8124: The rooms were very spacious and it was clean and tidy upon arrival! </p>
                </div>
                <div class="image-box-right"> 
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeFEyJy-7f0uY5Z_qD3LX9MA7YTnierRNg0LHACZ0H6A&s" alt="Your Image">
                </div>
            </div>
            <div class="rectangle" id="rectangle3">
                <!-- New text box with black border -->
                 <div class="text-box">
            <p>Visit RentMyCaravan.io</a> to find incredible discounts on caravans! Thanks to our budget-friendly 
			caravans anyone can plan a beautiful getaway for the weekend. Thanks to the positive feedback left 
			by our delighted clients, we're honored to be your first pick for reliable and reasonably priced 
			caravan rentals. Discover the comfort you deserve with the help of RentACaravan.io!</p>
         </div>
         </div>
            <div class="rectangle" id="rectangle4">
    
            <div class="text-box-left">
            <p>Visit <a href="ListOfCaravans.php">Rent A Caravan!</a> <br>
            Here you'll be able to edit, view, delete and customize our large selection of caravans to suit your needs!</p>
        </div>
  
        <div class="image-box-right">
          <img src="https://media.autoexpress.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1652783970/autoexpress/2022/05/Coachman-Lusso-caravan_tsf39e.jpg" alt="Your Image">
        </div>
        <div class="text-box-bottom">
           <p>Contact us: <br>
            RentMyCaravan.io@gmail.com <br>
            Phone: 07111 111 111</p>
        </div>
           <div class="image-box-bottom">
           <img src="https://i.pinimg.com/originals/82/c6/5b/82c65b9bb0a75026fc4c82a438b4cc9b.jpg" alt="Small Image">
        </div>
     </div>

        </div>
    </div>
    <!-- Added an anchor with id "get-started" (link) -->
    <a id="get-started"></a>
</body>
</html>
