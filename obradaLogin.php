<?php 
require("init.php");
require("dbConnection.php");

if(isset($_POST['email']) && isset($_POST['lozinka']))
{
	$username = $_POST['email'];
	$password = $_POST['lozinka'];
    $upit = "SELECT * FROM korisnik k WHERE k.email = '$username' AND k.password = '$password'";
    $rezultat = $mysqli->query($upit);

	if($rezultat->num_rows == 1)
	{	
        $red = $rezultat->fetch_object();
        $_SESSION['status'] = true;
        $_SESSION['id'] =$red->id;
        $_SESSION['username'] =$red->username;
        $_SESSION['email'] =$red->email;
        $_SESSION['ime'] =$red->ime;
        $_SESSION['prezime'] =$red->prezime;
        $_SESSION['role'] =$red->role;
		header("Location: index.php");
	}
	else {
		$greska = "Neispravni podaci.";
		$_SESSION['loginError'] = $greska;
		header("Location: login.php");
	}
} 
else
{
	$greska = "Nastala je greska pri logovanju! Molimo pokusajte ponovo.";
	$_SESSION['loginError'] = $greska;
	header("Location: login.php");
}
?>