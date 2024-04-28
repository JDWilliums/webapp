<?php
$conn = mysqli_connect("localhost", "root", "", "test3");
session_start();
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>