<?php 

include 'init.php';
include 'dbConnection.php';

$id = $_GET['id'];

$upit = "SELECT s.id as id, s.naziv as naziv, s.opis as opis, a.naziv as ulica, s.broj as broj, s.tip as tip, s.cena as cena, s.vlasnik as vlasnik, s.troskovi as troskovi FROM stan s JOIN adresa a on (s.ulica = a.id) WHERE s.id = $id";
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows != 1) {
    echo 'error';
    return;
}
$stan = $rezultat->fetch_object();
echo json_encode($stan);
?>