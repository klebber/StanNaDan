<?php 

include 'init.php';
include 'dbConnection.php';

if($_SESSION['status'] == false) {
    header("Location: error.php");
    exit();
}

$id = $_POST['id'];
$file_pattern = "img/stanovi/$id.*";
$mysqli->begin_transaction();
$upit = "DELETE FROM stan WHERE id = $id";
$rezultat = $mysqli->query($upit);

if ($rezultat == 1) {
    array_map("unlink", glob($file_pattern));
    $mysqli->commit();
    $_SESSION['temp'] = "Stan uspešno obrisan.";
    echo 'success';
}
else {
    echo 'error';
}


?>