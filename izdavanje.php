<!DOCTYPE html>
<html lang="en">

<?php
    include 'init.php';
    if(!$_SESSION['status']) {
        header("Location: error.php");
    }
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Izdavanje - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajIzdavanja()">

    <?php $page = 'izdavanje'; include 'header.php'; ?>
    

    <div class="container page-content">
      <h1>Izdavanje</h1>
      <?php if(isset($_SESSION['temp'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['temp']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } unset($_SESSION['temp']);?>
      <div class="dodavanje-stana">
        <a class='btn btn-primary' href='dodavanjestana.php'>Dodaj Novi Stan</a>
      </div>
      <br>
      <div id="tabela"></div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/izdavanje.js"></script>

</body>

</html>