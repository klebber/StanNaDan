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

  <title id="title"></title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajPodatkeOStanu(<?= $_GET['id']; ?>)">

    <?php include 'header.php'; ?>

    <div class="container page-content">
        <h1><div id="naziv"></div></h1>

        <div class="row">

            <div class="col-lg-8">


                <hr>

                <div id="lokacija"></div>

                <hr>

                <div id="opis"></div>

                <hr>

                <h4>Kalkulator prihoda po mesecima:</h4>

                <div class="kalkulator col-lg-8">
                    <input id="meseci" type="text" class="form-control"><span class="input-group-addon"></span>
                    <div id="info"><small class="text-muted">Izaberite mesec iznad, kako biste videli informacije i profitu za dati mesec.</small></div>
                </div>
  
            </div>

            <div class="col-lg-4">
                <div id="header-waves">
                    <img id="slika-small" class="img-fluid rounded" src="" alt="">
                </div>

                <div id="rezervacijeCard">
                    <div class="card my-4">
                        <h5 class="card-header">Rezervisani datumi</h5>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/detalji.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>