<?php 

include 'init.php';
include 'dbConnection.php';

if($_SESSION['status'] == false || $_SESSION['role'] != 'admin' || !isset($_REQUEST['operacija'])) {
    exit();
}
$operacija = $_REQUEST['operacija'];
switch($operacija) {
    case 'ucitavanjeSvih':
        $upit = "SELECT * FROM korisnik WHERE role = 'korisnik'";
        $rezultat = $mysqli->query($upit);
        if ($rezultat == false) {
            echo 'error';
            return;
        }
        echo json_encode($rezultat->fetch_all());
    break;
    case 'ucitavanje':
        $id = $_GET['id'];
        $upit = "SELECT * FROM korisnik WHERE role = 'korisnik' and id = $id";
        $rezultat = $mysqli->query($upit);
        if ($rezultat == false) {
            echo 'error';
            return;
        }
        echo json_encode($rezultat->fetch_row());
    break;
    case 'brisanje':
        $id = $_POST['id'];
        $upit = "DELETE FROM korisnik WHERE id = $id";
        $rezultat = $mysqli->query($upit);
        if ($rezultat == 1) {
            $_SESSION['temp'] = "Korisnik uspešno obrisan.";
            $_SESSION['temp-type'] = 'success';
        }
        else {
            $_SESSION['temp'] = "Greska prilikom brisanja korisnika!";
            $_SESSION['temp-type'] = 'danger';
            echo $mysqli -> error;
        }
    break;
}
?>