<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title id="title"></title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajKorisnika(<?= $_GET['id'] ?>)">

    <?php $page = 'korisnici'; include 'header.php'; ?>

    <div class="container page-content">
        <h1 id="header"></h1>
        <?php if(isset($_SESSION['temp'])) { ?>
        <div class="alert alert-<?= $_SESSION['temp-type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['temp']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } unset($_SESSION['temp']); unset($_SESSION['temp-type']);?>

        <form class="form" id="izmena_form" name="izmena_form" method="post" action="obradaIzmeneKorisnika.php">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="form-group">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" class="form-control" id="ime" required>
        </div>
        <div class="form-group">
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" class="form-control" id="prezime" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-submit">
            <button type="submit" name="frm_submit" class="btn btn-primary">Sačuvaj</button>
            <a href="korisnici.php" class="btn btn-primary">Nazad</a>
        </div>
        </form>
        

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/korisnici.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>