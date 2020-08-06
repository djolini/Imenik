<?php

require_once('biblioteka.php');

$adresaServera = 'localhost';
$korisnickoIme = 'root';
$lozinka = '';

try {
  $konekcija = new PDO("mysql:host=$adresaServera;dbname=imenik", $korisnickoIme, $lozinka);
} catch (PDOException $e) {
  greskaURadu('Doslo je do greske u povezivanju sa bazom!<br><br>Greska: ' . $e->getMessage());
}

 ?>
