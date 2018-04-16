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


?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="handle-results.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
<link rel="stylesheet" href="style.css"/>


<div id="form">
    <div class="row one">
        <div class="number">
            <span>1</span>
        </div>

        <div class="form-group">
            <label for="street">Straat</label>
            <input type="text" class="form-control"id="street">

            <div class="loadersmall" style="display:none"></div>
        </div>
    </div>

    <div class="row two">
        <div class="number">
            <span>2</span>
        </div>

        <div class="form-group">
            <div class="form">
                 <label for="housenumber">Huisnummer</label>
                 <input type="text" class="form-control" id="housenumber">
            </div>
            <div class="form">
                <label for="bus">Bus</label>
                <input type="text" class="form-control"id="bus">
           </div>
        </div>
    </div>

    <div class="row three">
        <div class="number">
            <span>3</span>
        </div>

        <div class="form-group">
            <label for="city">Plaats</label>
            <input type="text" class="form-control" id="city">
        </div>
    </div>

    <div class="row four">
        <div class="number">
            <span>4</span>
        </div>

        <div class="form-group">
            <label for="postcode">Postcode</label>
            <input type="text" class="form-control" id="postcode">
        </div>
    </div>
</div>