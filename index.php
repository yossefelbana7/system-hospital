<?php
include './shared/head.php';
include './shared/nav.php';
include './general/env.php';

// Fetch the current theme color from the database
$select = "SELECT * FROM `theem`";
$result = mysqli_query($conn, $select);

// Check if the query was successful and fetch the theme color
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $numOfColor = $row['color'];
} else {
    // Handle query execution error
    echo "Error fetching theme color: " . mysqli_error($conn);
}

// Handle theme change request
if (isset($_GET['change'])) {
    // Sanitize the input
    $num = intval($_GET['change']);

    // Update the theme color in the database
    $update = "UPDATE `theem` SET `color` = $num";
    $u = mysqli_query($conn, $update);

    if ($u) {
        // Redirect back to the homepage after updating
        header('location:/hospital/index.php');
        exit(); // Stop further execution
    } else {
        // Handle update error
        echo "Error updating theme color: " . mysqli_error($conn);
    }
}
?>
<div class="home">
    <?php if ($numOfColor == '2'): ?>
    <a href="/hospital/index.php?change=1" class="btn btn-dark" type="submit">Dark Mode</a>
    <?php else : ?>
    <a href="/hospital/index.php?change=2" class="btn btn-light" type="submit">Light Mode</a>
    <?php endif; ?>

    <h1 class="display-1 text-center text-info">Welcome to the Home Page</h1>
</div>
<?php include './shared/script.php'; ?>