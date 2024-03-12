<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

// Correct variable name for the SQL query
$select = "SELECT * FROM `categories`";
// Execute the query
$result = mysqli_query($conn, $select);

// Check if delete action is triggered
if(isset($_GET['delete'])){ 
    $id = mysqli_real_escape_string($conn, $_GET['delete']); 
    
   
    // Then delete the category
    $deleteCategory = "DELETE FROM categories WHERE id = $id ";
    $resultCategory = mysqli_query($conn, $deleteCategory);
    
    // Check if deletion was successful
    if($resultCategory) {
        // Redirect to the list page
        header('location: /hospital/category/list.php'); 
        exit(); 
    } else {
        // Display error message
        echo "Error deleting category: " . mysqli_error($conn);
    }
}
?>

<h1 class="display-1 text-center text-info">List Page</h1>

<center>
    <div class="container col-8 mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Check if query execution was successful
                        if ($result && mysqli_num_rows($result) > 0) {
                            // Fetch data from the result set
                            while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td>
                                <a class="btn btn-info"
                                    href="/hospital/category/add.php?edit=<?php echo $data['id']; ?>">Edit</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    href="/hospital/category/list.php?delete=<?php echo $data['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            // Handle query execution failure or no results
                            echo "<tr><td colspan='3'>No categories found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</center>

<?php include '../shared/script.php'; ?>