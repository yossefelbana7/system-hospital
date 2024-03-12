<?php 
include '../shared/head.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';


?>


<center>
    <div class="container col-6 mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Password">
                </div>

            </div>
        </div>
    </div>
</center>

<?php include '../shared/script.php'; ?>