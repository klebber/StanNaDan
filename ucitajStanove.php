<?php 

include 'init.php';
include 'dbConnection.php';

$where = "";

if(isset($_GET['vlasnik'])) {
    $vlasnik = $_SESSION['id'];
    $where = "WHERE s.vlasnik = $vlasnik";
}
else {
    $ulid = $_GET['ulid'];
    $tip = $_GET['tip'];

    if($ulid != "") {
        $where = "WHERE s.ulica = '$ulid' ";
        if($tip != "") {
            $where .= "AND ";
        }
    }
    if($tip != "") {
        if($where == "") {
            $where = "WHERE ";
        }
        $where .= "s.tip = '$tip' ";
    }
}
$upit = "SELECT s.id as id, s.naziv as naziv, s.opis as opis, a.naziv as ulica, s.broj as broj, s.tip as tip, s.cena as cena FROM stan s LEFT JOIN adresa a on s.ulica = a.id $where ORDER BY s.naziv";
$rezultat = $mysqli->query($upit);
if ($rezultat == false) {
    echo 'error';
    return;
}
echo json_encode($rezultat->fetch_all());