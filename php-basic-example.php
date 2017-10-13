<?php

// Authentication details
$client_id = 1177;
$secure_code = '9SRLYBCALURPE2B';

// Initialize address values
$postcode = '1014BA';
$huisnummer = 37;

$baseUrl = 'https://postcode.tig.nl/api/v3/json/getAddress/index.php';

$queryString = '?postcode=' . $postcode . '&huisnummer=' . $huisnummer . '&client_id=' . $client_id . '&secure_code=' . $secure_code;

$postcodeAdres = file_get_contents($baseUrl . $queryString);

$adres = json_decode($postcodeAdres);

echo "Straatnaam: $adres->straatnaam <br/> Woonplaats: $adres->woonplaats";