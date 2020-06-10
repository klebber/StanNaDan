<?php 

include 'init.php';
include 'dbConnection.php';

$where = "";
$stan = $_GET['stan'];
$korisnik = $_GET['korisnik'];
if(isset($_GET['stan'])) $where = "WHERE stan = $stan";
else if(isset($_GET['korisnik'])) $where = "WHERE korisnik = $korisnik";

$upit = "SELECT id, korisnik, stan, datum FROM rezervacija $where";

$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows == 0) {
    echo 'error';
    return;
}
$stan = $rezultat->fetch_all();
echo json_encode($stan);
?>