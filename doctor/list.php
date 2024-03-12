<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

// Fetch doctors data
$select = "SELECT doctors.id AS docID, doctors.image AS docImage, doctors.name AS docName, categories.name AS cat 
           FROM `doctors` 
           JOIN categories ON doctors.category_id = categories.id";
$result = mysqli_query($conn, $select);

// Check if deletion is requested
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

<h1 class="display-1 text-center text-info">List Page</h1>

<center>
    <div class="container col-10 mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>                      
                            <th>Category</th>                      
                            <th>Action</th>                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $data['docID']; ?></td>
                                    <td><?php echo $data['docName']; ?></td>
                                    <td><?php echo $data['cat']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="/hospital/doctor/show.php?show=<?php echo $data['docID']; ?>"><i class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-info" href="/hospital/doctor/add.php?edit=<?php echo $data['docID']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/hospital/doctor/list.php?delete=<?php echo $data['docID']; ?>"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>                 
            </div>
        </div>
    </div>
</center>

<?php include '../shared/script.php'; ?>
