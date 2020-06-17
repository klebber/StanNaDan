<!DOCTYPE html>
<html lang="en">

<?php
    if(!isset($_GET['id'])) {
        header("Location: error.php");
    }
?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Stanovi - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajPodatkeOStanu()">

    <?php include 'header.php'; ?>

    <div class="container page-content">

        <h1><div id="naziv"></div></h1>

        <div class="row">

            <div class="col-lg-8">

                <img id="slika" class="img-fluid rounded" src="" alt="">

                <hr>

                <div id="lokacija"></div>

                <hr>

                <div id="opis"></div>
  
            </div>

            <div class="col-md-4">
                <div id="infoCard">
                    <div class="card mb-4">
                        <h5 class="card-header">Trenutne informacije</h5>
                        <div class="card-body">
                        <div id="informacije"></div>
                        </div>
                    </div>
                </div>

                <div id="dostupnostCard">
                    <div class="card my-4">
                        <h5 class="card-header">Dostupnost</h5>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <div id="rezervacijaCard" <?php if($_SESSION['role'] != 'korisnik') { ?>style="display: none"<?php } ?>>
                    <div class="card my-4">
                        <h5 class="card-header">Rezevacija</h5>
                        <div class="card-body">
                            <p id="datumvalue">Izaberite datum u kalendaru.</p>
                            <button id="rezervacijabtn" class="btn btn-primary" disabled>Rezerviši</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/stan.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>