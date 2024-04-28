<?php
require 'config.php';

$errorMessage = '';

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        // Start session
        session_start();

        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Store user ID in session variable
        $_SESSION['user_id'] = $user['id'];

        // Redirect to dashboard
        header("Location: homepage.php");
        exit();
    } else {
        $errorMessage = "Invalid email or password. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      width: 300px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #56bf5a;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button.clear {
      background-color: #e63a2e;
    }

    button[type="submit"] {
      width: 100%;
    }

    p {
      margin-top: 16px;
      text-align: center;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Form for email and password input -->
  <form id="loginForm" action="login.php" method="post">
    <label for="Email">Email:</label>
    <input type="email" id="Email" name="email" required>

    <label for="Password">Password:</label>
    <input type="password" id="Password" name="password" required>

    <!-- Submit button and clear button -->
    <button type="submit" name="submit">Submit</button>
    <!-- Display error message if login fails -->
    <?php if(isset($errorMessage)): ?>
    <p><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <!-- registration link -->
    <p>Don't have an account? <a href="registration.php">Register here</a>.</p>

    <!-- return to homepage link -->
    <p><a href="homepage.php">Return to HomePage</a></p>
  </form>
</body>
</html>
