<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

// Try virheen käsittely catch nappaa virheen

try {

// avataan tietokanta shoppinglist, jossa hostina host, salasana ja käyttäjätunnus 'root' ja ''
$db = new PDO('mysql:host= localhost;dbname=shoppinglist;charset:utf8', 'root', '');
// Laitetaan avauksen jälkeen virheenkäsittelypäälle.
$db -> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
// tuodaan kaikki taulusta item
$sql= "select * from item";
// Suoritetaan lausetta tietokannassa (oliomuuttujalla), tähän palauttuu tulokset (rivit)
$query = $db -> query($sql);
// Muunnetaan rivit php- taulukoksi. Tekee assosiatiivisen taulukon
$results= $query ->fetchAll(PDO::FETCH_ASSOC);


// muutetaan jsoniksi, muuttujassa tulos, mikä printataan
$json = json_encode($results);
header('HTTP/1.1 200 OK');
print $json;

} catch (PDOException $pdoex) {
// virhekoodin otsikko    
header('HTTP/1.1 500 Internal Server Error');
$error = array('error' => $pdoex -> getMessage());
print json_encode($error);
}