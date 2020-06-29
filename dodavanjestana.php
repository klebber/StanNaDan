<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Novi stan - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body>

    <?php include 'header.php'; ?>
    

    <div class="container page-content">
      <h1>Dodavanje novog stana</h1>
      <?php if(isset($_SESSION['temp'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['temp']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } unset($_SESSION['temp']);?>
      <form class="form" id="login_form" name="login_form" method="post" enctype="multipart/form-data" action="obradaDodavanjeStana.php">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="naziv">Naziv:</label>
              <input type="text" name="naziv" class="form-control" id="naziv" required>
            </div>
            <div class="form-group">
              <label for="opis">Opis:</label>
              <textarea rows="2" type="text" name="opis" class="form-control" id="opis" required></textarea>
            </div>
            <div class="row">
              <div class="form-group col-md-9">
                <label for="ulica">Ulica:</label>
                <small class="text-muted"> [format: {ulica}, {oblast grada}]</small>
                <input type="text" name="ulica" class="form-control" id="ulica" required>
              </div>
              <div class="form-group col-md-3" style="padding-left: 0px;">
                <label for="broj">Broj:</label>
                <input type="text" name="broj" class="form-control" id="broj" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tip">Tip:</label>
              <select name="tip" class="form-control" id="tip" required>
                <option value="apartman">Apartman</option>
                <option value="jednosobni">Jednosobni stan</option>
                <option value="dvosobni">Dvosobni stan</option>
                <option value="trosobni">Trosobni stan</option>
                <option value="penthouse">Penthouse</option>
              </select>
            </div>
            <div class="form-group">
              <label for="cena">Cena:</label>
              <small class="text-muted"> [din/dan]</small>
              <input type="text" name="cena" class="form-control" id="cena" required>
            </div>
            <div class="form-group">
              <label for="troskovi">Troškovi:</label>
              <small class="text-muted"> [din/dan]</small>
              <input type="text" name="troskovi" class="form-control" id="troskovi" required>
            </div>
            <div class="form-group">
              <label for="fotografija">Odaberite fotografiju stana:</label>
              <input type="file" name="fotografija" class="form-control" id="fotografija" required>
            </div>
          </div>
        </div>
        <div class="form-submit">
          <button type="submit" name="frm_submit" class="btn btn-primary" style="width: 120px;">Sačuvaj</button>
        </div>
      </form>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>