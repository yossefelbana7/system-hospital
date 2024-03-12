            <?php 
            include '../shared/head.php';
            include '../shared/nav.php';
            include '../general/env.php';
            include '../general/functions.php';

            // Fetch categories from database
            $select = "SELECT * FROM `categories`";
            $cat = mysqli_query($conn, $select);

            $update = false;
            $name = "";
            $email = "";
            $category = "";

            $validName="";
            $validEmail="";
                
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                    if(isset($_POST['send'])){
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $catId = mysqli_real_escape_string($conn, $_POST['catId']);
                    if(empty($name)){
                        $validName=" Name IS Required";
                    }else{
                        if(empty($email)){
                            $validEmail="Email IS Required";
                        }else{
                        
                $image_name = time().  $_FILES['image']['name'];
                $image_temp = $_FILES['image']['tmp_name'];
                $location = "../upload/";
                if(move_uploaded_file($image_temp, $location . $image_name)){
                    echo 'Upload Image True';
                    print_r($_FILES);
                } else {
                    echo 'Upload Image False';
                }
                
                $insert = "INSERT INTO `doctors` VALUES (NULL, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $insert);
                mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $image_name, $catId);
                $i = mysqli_stmt_execute($stmt);
                testMessage($i, "Insert Doctor");
                    }


                }
            }


            }

            if(isset($_GET['edit'])){
                $id = $_GET['edit'];
                $update = true;
                $selectDoctor = "SELECT * FROM  `doctors` where id = ?";
                $stmt = mysqli_prepare($conn, $selectDoctor);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $email = $row['email'];
                $category = $row['category_id'];
            }

            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $catId = $_POST['catId'];
                $id = $_GET['edit'];
                $updateQuery = "UPDATE `doctors` SET `name`=?, `email`=?, `category_id`=? WHERE id=?";
                $stmt = mysqli_prepare($conn, $updateQuery);
                mysqli_stmt_bind_param($stmt, "ssii", $name, $email, $catId, $id);
                $u = mysqli_stmt_execute($stmt);
                testMessage($u, "Update Data");
                header('location:/hospital/category/list.php');
                exit();
            }
            ?>

            <?php if($update): ?>
            <h1 class="display-1 text-center text-info">Update Page</h1>
            <?php else: ?>
            <h1 class="display-1 text-center text-info">Add Page</h1>
            <?php endif ; ?>

            <center>
                <div class="container col-6 mt-5 text-center">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name : <span class="text-danger"><?php echo $validName ?></span></label>
                                    <input class="form-control" value="<?php echo $name ?>" name="name" type="text"
                                        placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label>Email :<span class="text-danger"> <?php echo $validEmail ?></span></label>
                                    <input class="form-control" value="<?php echo $email ?>" name="email" type="email"
                                        placeholder="Your Enter E-mail">
                                </div>

                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Category ID</label>
                                    <select name="catId" class="form-control">
                                        <?php
                                        // Loop through each category and create an option for each
                                        while ($data = mysqli_fetch_assoc($cat)) {
                                            echo "<option value='" . $data['id'] . "'>" . $data['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <?php if($update): ?>
                                <button name="update" class="btn btn-primary btn-block w-50 mx-auto">Update
                                    Data</button>
                                <?php else: ?>
                                <button name="send" class="btn btn-primary btn-block w-50 mx-auto">Send Data</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </center>

            <?php include '../shared/script.php'; ?>