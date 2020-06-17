<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Stanovi - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">
  

</head>

<body onload="ucitajStanove()">

    <?php include 'header.php'; ?>

    <div class="container page-content">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="list-group">
                    <a href="javascript:void(0);" onclick="insertParam('tip','apartman')" class="list-group-item <?php if($_GET['tip'] == 'apartman') echo 'active' ?>">Apartman</a>
                    <a href="javascript:void(0);" onclick="insertParam('tip','jednosobni')" class="list-group-item <?php if($_GET['tip'] == 'jednosobni') echo 'active' ?>">Jednosobni stan</a>
                    <a href="javascript:void(0);" onclick="insertParam('tip','dvosobni')" class="list-group-item <?php if($_GET['tip'] == 'dvosobni') echo 'active' ?>">Dvosobni stan</a>
                    <a href="javascript:void(0);" onclick="insertParam('tip','trosobni')" class="list-group-item <?php if($_GET['tip'] == 'trosobni') echo 'active' ?>">Trosobni stan</a>
                    <a href="javascript:void(0);" onclick="insertParam('tip','penthouse')" class="list-group-item <?php if($_GET['tip'] == 'penthouse') echo 'active' ?>">Penthouse</a>
                    <?php if(isset($_GET["tip"])) { ?>
                        <a href="javascript:void(0);" onclick="removeParam('tip')" class="list-group-item" style="color:red">Poništi Filter</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-9 mb-4">
                <div class="search" id="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Unesite naziv ulice..." autocomplete="off" onkeyup="getSuggestions()" id="searchquery" 
                        <?php if(isset($_GET["ulid"])) { ?> value="<?=$_SESSION['ulica']?>" <?php } ?>>
                        <?php if(isset($_GET["ulid"])) { ?>
                            <span class="input-group-btn">
                                <button class="btn btn-danger" onclick="removeParam('ulid')" type="button">X</button>
                            </span>
                        <?php } ?>
                    </div>
                    <div id="suggest"></div>
                </div>
                <div id="grid"></div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/stanovi.js"></script>

</body>

</html>