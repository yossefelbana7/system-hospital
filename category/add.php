<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $insert = "INSERT INTO `categories` VALUES (NULL , '$name')";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Category");
}
$name='';
$update = false;
if(isset($_GET['edit'])){
    $update=true;
    $id= $_GET['edit'];
    $select = "SELECT * FROM `categories` where id=$id";
    $ss = mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];



    if(isset($_POST['update'])){
        $name= $_POST['name'];
        $update = "UPDATE `categories` SET `name`='$name'  where id=$id";
        $u = mysqli_query($conn , $update);
        header ('location:/hospital/category/list.php');
}
}
?>

<?php if($update): ?>
<h1 class="display-1 text-center text-info">update Page</h1>
<?php else : ?>
<h1 class="display-1 text-center text-info">Add Page</h1>
<?php endif ; ?>

<center>
    <div class="container col-6 mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" value="<?php echo $name ?>" name="name" type="text" placeholder="Your Name">
                    </div>
                    <?php if($update): ?>
                        <button type="update" class="btn btn-primary btn-block w-50 mx-auto" name="submit">Update Data</button>
                     <?php else : ?>
                    <button type="submit" class="btn btn-info btn-block w-50 mx-auto" name="submit">Send Data</button>
                    <?php endif ; ?>

                </form>
            </div>
        </div>
    </div>
</center>

<?php include '../shared/script.php'; ?>
