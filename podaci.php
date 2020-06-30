<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Prikaz podataka - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajPodatkeOStanovima()">

    <?php $page = 'podaci'; include 'header.php'; ?>

    <div class="container page-content">
        <h1>Grafički prikaz podataka o stanovima</h1>
        <?php if(isset($_SESSION['temp'])) { ?>
        <div class="alert alert-<?= $_SESSION['temp-type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['temp']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } unset($_SESSION['temp']); unset($_SESSION['temp-type']);?>
        
        <div class="col-lg-6 col-md-8 selection">
            <label for="stan">Stan:</label>
            <select name="stan" class="form-control" id="stan" onchange="selectionChanged()"></select>
            <div id="info"><small class="text-muted">Izaberite stan za koji želite da prikažete podatke.</small></div>
        </div>
        <div id="grafici">
            <canvas class="grafik" height="300" id="temp"></canvas>
            <canvas class="grafik" height="300" id="hum"></canvas>
            <canvas class="grafik" height="300" id="co2"></canvas>
            <canvas class="grafik" height="300" id="light"></canvas>
        </div>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="js/podaci.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>