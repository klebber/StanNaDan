<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Rezervacije - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajRezervacije()">

    <?php $page = 'rezervacije'; include 'header.php'; ?>
    

    <div class="container page-content">
      <h1>Rezervacije</h1>
      <?php if(isset($_SESSION['temp'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['temp']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } unset($_SESSION['temp']);?>
      <div id="tabela"></div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/rezervacije.js"></script>

</body>

</html>