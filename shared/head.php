<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'hospital';

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $dbName);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the theme color from the database
$select = "SELECT * FROM `theem`";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$themeColor = $row['color'];

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/hospital/css/main.css">
    <link rel="stylesheet" href="/hospital/css/all.min.css">
    <?php if ($themeColor == '2'): ?>
        <link rel="stylesheet" href="/hospital/css/light.css">
    <?php else: ?>
        <link rel="stylesheet" href="/hospital/css/dark.css">
    <?php endif; ?>
</head>
<body>                                                                                                                                                                                      
