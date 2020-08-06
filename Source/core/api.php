<?php

require_once('baza.php');
require_once('biblioteka.php');

if (!isset($_POST['komanda'])) {
  greskaURadu('Poziv nije izvrsen na regularan nacin!');
} else {
  $komanda = $_POST['komanda'];
}

switch ($komanda) {
  case 'citanje':
    $izlazniXML = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><ljudi></ljudi>');

    $rezultat = $konekcija->prepare("SELECT id, imePrezime, telefon FROM spisak ORDER BY imePrezime");
    $rezultat->execute();

    while ($red = $rezultat->fetch(PDO::FETCH_ASSOC)) {
      $covek = $izlazniXML->addChild('covek');
      $covek->addChild('id', $red['id']);
      $covek->addChild('imePrezime', $red['imePrezime']);
      $covek->addChild('telefon', $red['telefon']);
    }
    break;

  case 'upis':
    if (!(isset($_POST['imePrezime']) && isset($_POST['telefon']))) {
        greskaURadu('Poziv nije izvrsen na regularan nacin!');
      }
      $rezultat = $konekcija->prepare("INSERT INTO spisak (imePrezime, telefon) VALUES (?, ?)");
      $rezultat->execute([$_POST['imePrezime'], $_POST['telefon']]);

      $izlazniXML = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><unos></unos>');
      $izlazniXML->addChild('poruka', 'Unos je uspesno obavljen.');
    break;

  case 'brisanje':
      if (!isset($_POST['id'])) {
        greskaURadu('Poziv nije izvrsen na regularan nacinnn!');
      }
      $rezultat = $konekcija->prepare("DELETE FROM spisak WHERE id = ?");
      $rezultat->execute([$_POST['id']]);

      $izlazniXML = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><brisanje></brisanje>');
      $izlazniXML->addChild('poruka', 'Brisanje je uspesno obavljeno.');
    break;

  case 'izmena':
  if (!(isset($_POST['id']) && isset($_POST['imePrezime']) && isset($_POST['telefon']))) {
      greskaURadu('Poziv nije izvrsen na regularan nacin!');
    }
    $rezultat = $konekcija->prepare("UPDATE spisak SET imePrezime = ?, telefon = ? WHERE id = ?");
    $rezultat->execute([$_POST['imePrezime'], $_POST['telefon'], $_POST['id']]);

    $izlazniXML = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><izmena></izmena>');
    $izlazniXML->addChild('poruka', 'Izmena je uspesno obavljena.');
    break;

  default:
    greskaURadu('Komanda nije prepoznata!');
    break;
}

Header('Content-type: text/xml');
echo $izlazniXML->asXML();
?>
