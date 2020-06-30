<?php require 'init.php'; ?>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><strong>Stan Na Dan</strong></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php if($page == 'pocetna') echo 'active' ?>">
          <a class="nav-link" href="index.php">Početna</a>
        </li>
        <li class="nav-item <?php if($page == 'stanovi') echo 'active' ?>">
          <a class="nav-link" href="stanovi.php">Stanovi</a>
        </li>
        <?php if($_SESSION['status'] == true && $_SESSION['role'] == 'korisnik'){ ?>
        <li class="nav-item <?php if($page == 'rezervacije') echo 'active' ?>">
          <a class="nav-link" href="rezervacije.php">Rezervacije</a>
        </li>
        <li class="nav-item <?php if($page == 'izdavanje') echo 'active' ?>">
          <a class="nav-link" href="izdavanje.php">Izdavanje</a>
        </li>
        <?php } ?>
        <?php if($_SESSION['status'] == true && $_SESSION['role'] == 'admin'){ ?>
        <li class="nav-item <?php if($page == 'korisnici' || $page == 'podaci') echo 'active' ?> dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administracija</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item <?php if($page == 'korisnici') echo 'active' ?>" href="korisnici.php">Upravljanje korisnicima</a>
            <a class="dropdown-item <?php if($page == 'podaci') echo 'active' ?>" href="podaci.php">Pregled podataka</a>
          </div>
        </li>
        <?php } ?>
        <?php if($_SESSION['status'] == false){ ?>
        <li class="nav-item <?php if($page == 'login') echo 'active' ?>">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <?php } ?>
        <?php if($_SESSION['status'] == true){ ?>
        <li class="nav-item">
          <a class="nav-link" href="obradaLogout.php">Logout (<?= $_SESSION['username']; ?>)</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>