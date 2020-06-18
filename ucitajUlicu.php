<?php 

include 'init.php';
include 'dbConnection.php';

$ulid = $_GET['ulid'];

$upit = "SELECT naziv FROM adresa WHERE id = $ulid";
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows != 1) {
    echo "error";
    return;
}
$ulica = $rezultat->fetch_object();
echo $ulica->naziv;