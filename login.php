<!DOCTYPE html>
<html lang="en">

<?php require 'init.php';
if ($_SESSION['status'] == true) {
    header("Location: error.php");
} ?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login - Stan Na Dan</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/site.css" rel="stylesheet">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container page-content">
        <div class="row">
            <div class="col-md-6 login-form">
                <h2>Login</h2>
                <form class="form" id="login_form" name="login_form" method="post" action="obradaLogin.php">
                    <div class="form-group">
                        <label for="email">E-mail adresa:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">   
                        <label for="lozinka">Lozinka:</label>    
                        <input id="lozinka" name="lozinka" type="password" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-submit">
                        <button type="submit" name="frm_submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['loginError'])) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['loginError'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['loginError']);
                 } ?>
            </div>
            <div class="col-md-6 register-form">
                <h2>Nemate nalog? Registrujte se!</h2>
                <form class="form" id="dodaj_korisnika" name="dodaj_korisnika" method="post" action="obradaRegistracije.php">
                    <div class="form-group">
                        <label for="email">E-mail adresa:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">              
                        <label for="ime">Ime:</label>
                        <input id="ime" name="ime" type="text" class="form-control" required autocomplete="off">
                    </div>   
                    <div class="form-group">              
                        <label for="prezime">Prezime:</label>
                        <input id="prezime" name="prezime" type="text" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">   
                        <label for="lozinka">Lozinka:</label>    
                        <input id="lozinka" name="lozinka" type="password" class="form-control" required>
                    </div>    
                    <div class="form-group">   
                        <label for="lozinka2">Ponoviti lozinku:</label>    
                        <input id="lozinka2" name="lozinka2" type="password" class="form-control" required>
                    </div> 
                    <div class="form-submit">
                        <button type="submit" name="frm_submit" class="btn btn-primary">Registruj se</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['registerInfo'])) {?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['registerInfo'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['registerInfo']);
                 }
                 if(isset($_SESSION['registerError'])) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['registerError'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['registerError']);
                 } ?>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
