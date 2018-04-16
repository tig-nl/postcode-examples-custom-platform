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
jQuery( function ($) {
    var postcode = $('#postcode'),
        housenumber = $('#housenumber'),
        street = $('#street'),
        city = $('#city');
    loader = $('.loadersmall');
    function addDisabled() {
        $('.row.three .number').addClass('disabled');
        $('.row.four .number').addClass('disabled');
        city.attr('disabled', true);
        postcode.attr('disabled', true);
    }
    function removeDisabled() {
        $('.row.three .number').removeClass('disabled');
        $('.row.four .number').removeClass('disabled');
        city.attr('disabled', false);
        postcode.attr('disabled', false);
    }

    addDisabled()
    loader.hide();

    street.autocomplete({
        source: function (request, response) {
            console.log(request.term);
            $.ajax({
                type: "POST",
                url: 'postcode.php',
                data: { street: request.term },
                dataType: "json",
                success: response,
                beforeSend: function(){
                    loader.show();
                },
                error: function () {
                    response([]);
                },
                complete: function(){
                    loader.hide();
                }
            });
        },
        select: function (event, ui) {
            housenumber.focus();
            removeDisabled()

            postcode.val(ui.item.postcode);
            city.val(ui.item.city);

            setTimeout( function () {
                street.val(ui.item.street);
            });
        },
        minLength: 2
    });

    $('#street').blur(function(){
        if( $(this).val().length === 0 ) {
            addDisabled();
            postcode.val('');
            city.val('');
            loader.hide();
        } else {
            removeDisabled();
        }
    });
});