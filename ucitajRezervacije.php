<?php 

include 'init.php';
include 'dbConnection.php';

$where = "";

if(isset($_GET['stan'])) {
    $stan = $_GET['stan'];
    $where = "WHERE stan = $stan";
}
else {
    $korisnik = $_SESSION['id'];
    $where = "WHERE korisnik = $korisnik";
}    

$upit = "SELECT r.id as id, r.korisnik as korisnik, r.stan as stan, r.datum as datum, s.naziv as naziv, s.cena as cena FROM rezervacija r join stan s on r.stan = s.id $where";

$rezultat = $mysqli->query($upit);
if ($rezultat == false) {
    echo 'error';
    return;
}
echo json_encode($rezultat->fetch_all());
?>