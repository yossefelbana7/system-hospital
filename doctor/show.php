<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

// Fetch doctors data
$select = "SELECT doctors.id AS docID, doctors.image AS docImage, doctors.name AS docName, doctors.email AS docEmail, categories.name AS cat 
           FROM `doctors` 
           JOIN categories ON doctors.category_id = categories.id";
$result = mysqli_query($conn, $select);

// Handle delete action
if(isset($_GET['delete'])){ 
    $id = mysqli_real_escape_string($conn, $_GET['delete']); 
    $delete = "DELETE FROM `doctors` WHERE id = $id";
    $d = mysqli_query($conn, $delete);
    if($d) {
        // Redirect back to the list page after deletion
        header('Location: /hospital/doctors/list.php'); 
        exit(); // Stop further execution
    } else {
        // Handle deletion error
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <h1 class="display-1 text-center text-info">Show Profile Item <?php echo $row['docID']; ?></h1>

    <center>
        <div class="container col-4 mt-5 text-center">
            <div class="card">
                <img src="/hospital/upload/<?php echo $row['docImage']; ?>" class="image-top" alt="image">
                <div class="card-body">
                    <h3> <?php echo $row['docName'];?></h3>
                    <p><?php echo $row['cat'] ; ?></p>   
                    <a class="btn btn-info" href="/hospital/doctor/add.php?edit=<?php echo $row['docID'] ; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/hospital/doctor/list.php?delete=<?php echo $row['docID'] ; ?>"><i class="fa-regular fa-trash-can"></i></a>
                </div>
            </div>
        </div>
    </center>
<?php endwhile; ?>

<?php include '../shared/script.php'; ?>
