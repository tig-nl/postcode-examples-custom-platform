<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@totalinternetgroup.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Feel free to edit or add to this file. If you have any questions regarding this example
 * contact servicedesk@totalinternetgroup.nl
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
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