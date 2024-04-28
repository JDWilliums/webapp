<?php
require 'config.php';

// Check if the form is submitted
if(isset($_POST["submit"])){
    // Get form data
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $DOB = $_POST["DOB"];
    $address = $_POST["address"];
    $number = $_POST["number"];

    // Check if email already exists
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Email is already in use.'); </script>";
    } else {
        // Insert new user into database
        $query = "INSERT INTO users (email, pass, first_name, last_name, DOB, address, number) VALUES ('$email', '$pass', '$first_name', '$last_name', '$DOB', '$address', '$number')";
        
        if(mysqli_query($conn, $query)){
            echo "<script> alert('Registration Successful'); </script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: white;
    }
    /* styling */
    .container {
      width: 300px;
      margin: 100px auto 0;
    }
    /* styling */
    .rectangle, .register-rectangle {
      height: 50px;
      background-color: #f4f4f4;
      border: 2px solid black;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      position: relative;
    }
    /* styling */
    .register-rectangle {
      display: inline-block;
      padding: 10px;
      margin-bottom: 10px;
      background-color: white;
      border: none;
      text-align: center;
      font-weight: bold;
    }
    /* styling */
    .textbox {
      width: calc(100% - 4px);
      border: none;
      background: none;
      padding: 0 10px;
      height: 100%;
      box-sizing: border-box;
    }
    /* styling */
    .register-rectangle-small {
      height: 25px;
      background-color: #add8e6;
      border: 2px solid black;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      position: relative;
    }
    /* styling */
    .register-text-small {
      margin: 0;
      text-align: center;
      font-weight: bold;
      color: black;
      width: 100%;
    }

    .error {
      color: red;
      font-size: 12px;
    }

    .login-button {
      padding: 100px;
    }
  </style>
</head>
<body>
<form class="" action="registration.php" method="post" autocomplete="off" onsubmit="return validateForm()">
    <div class="container">
      <div class="rectangle">
        <input type="text" id="email" name="email" placeholder="Email*" class="textbox">
        <span id="email-error" class="error"></span>
      </div>
      <div class="rectangle" style="margin-bottom: 30px;">
        <input type="password" id="password" name="password" placeholder="Password*" class="textbox">
        <span id="password-error" class="error"></span>
      </div>
      <div class="rectangle">
        <input type="text" id="firstName" name="first_name" placeholder="First Name" class="textbox">
        <span id="firstName-error" class="error"></span>
      </div>
      <div class="rectangle">
        <input type="text" id="lastName" name="last_name" placeholder="Last Name" class="textbox">
        <span id="lastName-error" class="error"></span>
      </div>
      <div class="rectangle">
        <input type="text" id="birthDate" name="DOB" placeholder="Birth Date (YYYY-MM-DD)" class="textbox">
        <span id="birthDate-error" class="error"></span>
      </div>
      <div class="rectangle">
        <input type="text" id="address" name="address" placeholder="Address" class="textbox">
        <span id="address-error" class="error"></span>
      </div>
      <div class="rectangle">
        <input type="text" id="mobileNumber" name="number" placeholder="Mobile Number" class="textbox">
        <span id="mobileNumber-error" class="error"></span>
      </div>
      <button type="submit" class="register-rectangle-small" name="submit">Register</button>
      <div class="login-button">
        <a href="login.php">Return to Login</a>
      </div>
    </div>
</form>

  
<script>
  function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var birthDate = document.getElementById('birthDate').value;
    var address = document.getElementById('address').value;
    var mobileNumber = document.getElementById('mobileNumber').value;
    
    var isValid = true;
    
    // Validate email
    if (!email) {
      document.getElementById('email-error').innerText = "Email is required";
      isValid = false;
    } else {
      document.getElementById('email-error').innerText = "";
    }
    
    // Validate password
    if (!password) {
      document.getElementById('password-error').innerText = "Password is required";
      isValid = false;
    } else {
      document.getElementById('password-error').innerText = "";
    }
    
    // Validate first name
    if (!firstName) {
      document.getElementById('firstName-error').innerText = "First Name is required";
      isValid = false;
    } else {
      document.getElementById('firstName-error').innerText = "";
    }
    
    // Validate last name
    if (!lastName) {
      document.getElementById('lastName-error').innerText = "Last Name is required";
      isValid = false;
    } else {
      document.getElementById('lastName-error').innerText = "";
    }
    
    // Validate birth date
    if (!birthDate) {
      document.getElementById('birthDate-error').innerText = "Birth Date is required";
      isValid = false;
    } else {
      document.getElementById('birthDate-error').innerText = "";
    }
    
    // Validate address
    if (!address) {
      document.getElementById('address-error').innerText = "Address is required";
      isValid = false;
    } else {
      document.getElementById('address-error').innerText = "";
    }
    
    // Validate mobile number
    if (!mobileNumber) {
      document.getElementById('mobileNumber-error').innerText = "Mobile Number is required";
      isValid = false;
    } else {
      document.getElementById('mobileNumber-error').innerText = "";
    }
    
    return isValid;
  }
</script>

</body>
</html>
