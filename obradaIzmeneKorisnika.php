<?php 

include 'init.php';
include 'dbConnection.php';

if($_SESSION['status'] == false || $_SESSION['role'] != 'admin') {
    exit();
}
$id = $_POST['id'];
$username = $_POST['username'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];

$mysqli->begin_transaction();
$upit = "UPDATE korisnik SET username = '$username', ime = '$ime', prezime = '$prezime', email = '$email' WHERE id = $id";
$rezultat = $mysqli->query($upit);
if ($rezultat == 1) {
    $_SESSION['temp'] = "Korisnik uspešno izmenjen.";
    $_SESSION['temp-type'] = 'success';
    $mysqli->commit();
}
else {
    $_SESSION['temp'] = "Greska prilikom izmene korisnika!";
    $_SESSION['temp-type'] = 'danger';
    $mysqli->rollback();
}
header("Location: korisnici.php");
?>