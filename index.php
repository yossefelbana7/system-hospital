<?php include './shared/head.php' ;
include './shared/nav.php';
include './general/env.php';

  $select="select *from `theem`";
    $s = mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($s);
    $nnumOfColor= $row['color'];



    if(isset($_GET['change'])){
      $num=  $_GET['change'];
        $update="UPDATE `theem` set `color`= $num ";
      $u = mysqli_query($conn,$update);
      header('location:/hospital/index.php');    

      
      
    }
?>
<div class="home">
    <?php if($nnumOfColor=='2'): ?>
    <a href="/hospital/index.php?change=1" class="btn btn-dark " type="submit">dark Mood</a>
    <?php else : ?>
    <a href="/hospital/index.php?change=2" class="btn btn-light " type="submit">light Mood</a>
    <?php endif ; ?>

    <h1 class="display-1 text-center text-info">Welcome At Home Page</h1>
</div>
<?php include './shared/script.php'; ?>