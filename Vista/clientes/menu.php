<?php
session_start();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Sidebars · Bootstrap v5.3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="../css/menu.css">
  </head>
<body>
<main class="d-flex flex-nowrap">

  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <a href="#" class="d-flex mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4"><img src="../img/logos/Positivo3.webp" style="width:200px;"></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="inicio.php" class="nav-link text-white" aria-current="page">
        <i class="class= bi bi-person-circle"></i>
          Perfil
        </a>
      </li>
      <li>
        <a href="productos.php" class="nav-link text-white">
        <i class="bi bi-bag-plus-fill"></i>
          Productos
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
        <i class="bi bi-calendar-date-fill"></i>
          Citas
        </a>
      </li>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <strong><?php echo $_SESSION['nombres']?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
      </ul>
    </div>
  </div>
  <div class="b-example-divider b-example-vr"></div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>