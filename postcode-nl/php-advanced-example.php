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
class TIG_Postcode
{
    protected $_options
        = array(
            'client_id'   => '',
            'secure_code' => '',
            'failonerror' => 1,
            'connecttimeout' => 5,
            'returntransfer' => 1,
        );

    function __construct($client_id, $secure_code) {
        $this->_options['client_id'] = $client_id;
        $this->_options['secure_code'] = $secure_code;
    }

    public function search($postcode, $housenumber)
    {
        $url = 'https://postcode.tig.nl/api/v3/json/getAddress/index.php?' . http_build_query(
                array(
                    'postcode'    => $postcode,
                    'huisnummer'  => $housenumber,
                    'client_id'   => $this->_options['client_id'],
                    'secure_code' => $this->_options['secure_code'],
                    'domain'      => $_SERVER['HTTP_HOST'],
                    'remote_ip'   => $_SERVER['REMOTE_ADDR']
                )
            );

        try {
            if (!function_exists('curl_init')) {
                throw new Exception('cURL library is not installed!');
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, $this->_options['failonerror']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, $this->_options['returntransfer']);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_options['connecttimeout']);
            $response = curl_exec($ch);

            if ($response === false) {
                throw new Exception(curl_error($ch));
            }
            curl_close($ch);

            $address = json_decode($response);

            if($address->success === true)
            {
                return $address;
            }

        } catch (Exception $e) {
            echo($e->getMessage());
        }

        return false;
    }
}
$client_id = 1177;
$secure_code = '9SRLYBCALURPE2B';

$postcode = '1014BA';
$huisnummer = 37;


$instance = new TIG_Postcode($client_id, $secure_code);
$address = $instance->search($postcode, $huisnummer);

echo "Straatnaam: $address->straatnaam <br/> Woonplaats: $address->woonplaats";