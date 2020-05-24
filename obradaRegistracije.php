<?php 
require 'init.php';
require 'dbConnection.php';

if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['lozinka']) && isset($_POST['lozinka2']))
{
    if($_POST['lozinka'] != $_POST['lozinka2']) {
        $greska = "Lozinke se ne poklapaju!";
        $_SESSION['registerError'] = $greska;
        header("Location: login.php");
        exit;
    }
	$email = $_POST['email'];
	$username = $_POST['username'];
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$password = $_POST['lozinka'];
    $upit = "INSERT INTO korisnik (email, username, password, ime, prezime, role) VALUES ('$email', '$username', '$password', '$ime', '$prezime', 'korisnik')";
    $rezultat = $mysqli->query($upit);

	if($rezultat)
	{	
        $poruka = "Registracija uspešna! Možete se ulogovati sa kreiranim nalogom.";
		$_SESSION['registerInfo'] = $poruka;
		header("Location: login.php");
	}
	else {
		$greska = "Neispravni podaci za registraciju.";
		$_SESSION['registerError'] = $greska;
		header("Location: login.php");
	}
} 
else
{
	$greska = "Nastala je greška pri registraciji! Molimo pokušajte ponovo.";
	$_SESSION['registerError'] = $greska;
	header("Location: login.php");
}
?>