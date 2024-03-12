<?php

?>
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/hospital/doctor/add.php">Add</a>
          <a class="dropdown-item" href="/hospital/doctor/list.php">List</a>
          
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/hospital/category/add.php">Add</a>
          <a class="dropdown-item" href="/hospital/category/list.php">List</a>
          
        </div>
      </li>
      <a href="/hospital/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
    </ul>
    
  </div>
</nav>