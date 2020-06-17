<?php 

include 'init.php';
include 'dbConnection.php';

if($_SESSION['status'] == false) {
    header("index.php");
    exit();
}

$upit = "";

if ($_POST["operacija"] == "dodavanje") {
    $korisnik = $_SESSION['id'];
    $stan = $_POST['stan'];
    $datum = $_POST['datum'];
    $upit = "INSERT INTO rezervacija (korisnik, stan, datum) VALUES ($korisnik, $stan, '$datum')";
    $success = "Uspešna rezervacija.";
}
else if ($_POST["operacija"] == "brisanje") {
    $id = $_POST['id'];
    $upit = "DELETE FROM rezervacija WHERE id = $id";
    $success = "Rezervacija uspešno poništena.";
}

$rezultat = $mysqli->query($upit);


if ($rezultat == 1) {
    $_SESSION['temp'] = $success;
    echo 'success';
}
else {
    echo 'error';
}
?>