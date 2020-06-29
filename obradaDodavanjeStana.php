<?php 
require 'init.php';
require 'dbConnection.php';

if(!isset($_POST['naziv'], $_POST['opis'], $_POST['ulica'], $_POST['broj'], $_POST['tip'], $_POST['cena'], $_POST['troskovi'])) {
    $_SESSION['temp'] = "Nisu uneti svi podaci!";
    header("Location: dodavanjestana.php");
    exit;
}

$mysqli->begin_transaction();

$ulica = -1;

$nazivulice = $_POST['ulica'];

$upit = "SELECT id FROM adresa WHERE naziv = '$nazivulice'";
$rezultat = $mysqli->query($upit);
if ($rezultat->num_rows == 1) {
    $ulica = ($rezultat->fetch_object())->id;
}
else {
    $upit = "INSERT INTO adresa (naziv) VALUES ('$nazivulice')";
    $rezultat = $mysqli->query($upit);
    if($rezultat) {
        $ulica = $mysqli->insert_id;
    }
    else {
        $mysqli->rollback();
        $_SESSION['temp'] = "Greska pri dodavanju ulice!";
        header("Location: dodavanjestana.php");
        exit;
    }
}
    
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$broj = $_POST['broj'];
$tip = $_POST['tip'];
$cena = $_POST['cena'];
$troskovi = $_POST['troskovi'];
$vlasnik = $_SESSION['id'];
$upit = "INSERT INTO stan (naziv, opis, ulica, broj, tip, cena, vlasnik, troskovi) VALUES ('$naziv', '$opis', $ulica, '$broj', '$tip', $cena, $vlasnik, $troskovi)";
$rezultat = $mysqli->query($upit);

if(!$rezultat) {
    $mysqli->rollback();
    $_SESSION['temp'] = "Greska pri dodavanju stana!";
    header("Location: dodavanjestana.php");
    exit;
}

$stan = $mysqli->insert_id;

$target_dir = "img/stanovi/";
$imageFileType = strtolower(end(explode('.',$_FILES['fotografija']['name'])));
$target_file = $target_dir . $stan . '.' . $imageFileType;

if (!move_uploaded_file($_FILES["fotografija"]["tmp_name"], $target_file)) {
    $mysqli->rollback();
    $_SESSION['temp'] = "Greska pri uploadovanju slike!";
    header("Location: dodavanjestana.php");
    exit;
}

$mysqli->commit();
$_SESSION['temp'] = "Stan uspešno dodat.";
header("Location: izdavanje.php");

?>