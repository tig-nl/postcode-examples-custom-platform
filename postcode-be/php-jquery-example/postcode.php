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
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@totalinternetgroup.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
class TIG_PostcodeBe
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

    public function search($street)
    {
        $url = 'https://postcode-be.tig.nl/api/be/find?' . http_build_query(
                array(
                    'street'    => $street,
                )
            );

        try {
            if (!function_exists('curl_init')) {
                throw new Exception('cURL library is not installed!');
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERPWD, $this->_options['client_id'].":".$this->_options['secure_code']);
            curl_setopt($ch, CURLOPT_FAILONERROR, $this->_options['failonerror']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, $this->_options['returntransfer']);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_options['connecttimeout']);
            $response = curl_exec($ch);

            if ($response === false) {
                throw new Exception(curl_error($ch));
            }
            curl_close($ch);

            return $response;

        } catch (Exception $e) {
            echo($e->getMessage());
        }

        return false;
    }
}

$street = '';

if (isset($_POST['street'])) {
    $street = $_POST['street'];
}

$client_id = 1177;
$secure_code = '9SRLYBCALURPE2B';

$instance = new TIG_PostcodeBe($client_id, $secure_code);
$addressJson = $instance->search($street);

echo $addressJson;
