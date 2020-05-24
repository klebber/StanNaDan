<!DOCTYPE html>
<html lang="en">
<?php include 'init.php'; ?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stan na Dan - Platforma za izdavanje stanova na dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">

</head>

<body>

  <?php include 'header.php'; ?>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url('img/1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>ZEN APARTMAN, DORĆOL</h3>
            <p>ZEN je studio apartman, čiji enterijer nikog ne ostavlja ravnodušnim.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('img/2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>GLAM, 1-SOBNI STAN, NOVI BEOGRAD</h3>
            <p>Jedan od luksuzno opremljenih apartmana iz naše ponude je Apartman Glam.</p>
          </div>
        </div>
        <div class="carousel-item" style="background-image: url('img/3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3>TRITON, 2-SOBNI APARTMAN BEOGRAD</h3>
            <p>Lokacija apartmana TRITON je poslednjih godina izuzetno atraktivna – on je pravi pravcati dvosoban stan na dan na Čuburi sa garažom.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <div class="container">

    <h1 class="my-4">Stan na dan - Beograd</h1>

    <div class="row">
      <div class="col-lg-6">
        <p>Idealno rešenje ukoliko ne biste da potrošite previše novca na stan u Beogradu za samo jedan dan.</p>
        <p>Ništa ne brinite jer će vas ponuda Stan na Dan Beograd koštati manje nego što možete i da zamislite.</p>
        <p>Sve što je potrebno jeste tri minuta potrošenog vremena kako biste pronašli odgovarajući stan na našem portalu.</p>
        <p>Iako deluje neverovatno, stan na dan zaista je moguće iznajmiti tako brzo, u svega par koraka.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://placehold.it/700x350" alt="">
      </div>
    </div>

    <hr>

    <div class="row mb-4">
      <div class="col-md-8">
        <p>Ukoliko želite da pregledate našu ponudu stanova, to možete uraditi klikom na dugme.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="stanovi.php">Ponuda Stanova <span class="iconify" data-icon="oi-arrow-right" data-inline="false"></span></a>
      </div>
    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
