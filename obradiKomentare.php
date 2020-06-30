<?php 

include 'init.php';
include 'dbConnection.php';

if($_SESSION['status'] == false || !isset($_GET['operacija'])) {
    exit();
}
$operacija = $_GET['operacija'];
switch($operacija) {
    case 'ucitavanje':
        $stan = $_GET['stan'];
        $upit = "SELECT kom.id as id, kom.tekst as tekst, kor.id as korisnik, kor.username as ime FROM komentar kom JOIN korisnik kor ON kom.korisnik = kor.id WHERE stan = $stan";
        $rezultat = $mysqli->query($upit);
        if ($rezultat->num_rows == 0) {
            return;
        }
        while ($red = $rezultat->fetch_object()) { ?>
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="img/user.jpg" alt="profil">
                <div class="media-body">
                    <h5 class="mt-0"><?=$red->ime?></h5>
                    <?=$red->tekst?>
                </div>
                <?php if($_SESSION['role'] == 'admin' || $_SESSION['id'] == $red->korisnik) { ?>
                    <a class="commentDelete" onclick="obrisiKomentar(<?=$red->id?>)">Obriši komentar</a>
                <?php } ?>
            </div>
        <?php }
    break;
    case 'dodavanje':
        $korisnik = $_SESSION['id'];
        $stan = $_GET['stan'];
        $tekst = $_GET['tekst'];
        $upit = "INSERT INTO komentar (stan, korisnik, tekst) VALUES ($stan, $korisnik, '$tekst')";
        $rezultat = $mysqli->query($upit);
        if ($rezultat == 1) {
            $_SESSION['temp'] = "Komentar uspešno objavljen.";
            echo 'success';
        }
        else {
            echo 'error';
        }
    break;
    case 'brisanje':
        $id = $_GET['id'];
        $upit = "DELETE FROM komentar WHERE id = $id";
        $rezultat = $mysqli->query($upit);
        if ($rezultat == 1) {
            $_SESSION['temp'] = "Komentar uspešno obrisan.";
            echo 'success';
        }
        else {
            echo 'error';
        }
    break;
}
?>