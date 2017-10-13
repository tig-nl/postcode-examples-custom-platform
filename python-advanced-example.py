#
#
#          ..::..
#     ..::::::::::::..
#   ::'''''':''::'''''::
#   ::..  ..:  :  ....::
#   ::::  :::  :  :   ::
#   ::::  :::  :  ''' ::
#   ::::..:::..::.....::
#     ''::::::::::::''
#          ''::''
#
#
# NOTICE OF LICENSE
#
# This source file is subject to the Creative Commons License.
# It is available through the world-wide-web at this URL:
# http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
# If you are unable to obtain it through the world-wide-web, please send an email
# to servicedesk@totalinternetgroup.nl so we can send you a copy immediately.
#
# DISCLAIMER
#
# Feel free to edit or add to this file. If you have any questions regarding this example
# contact servicedesk@totalinternetgroup.nl
#
# @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
# @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
#
import requests
import socket
import json

client_id = 1177;
secure_code = "9SRLYBCALURPE2B";

class Address(object):
    def __init__(self, j):
        self.__dict__ = json.loads(j)

def search(postcode, housenumber):
    url = "https://postcode.tig.nl/api/v3/json/getAddress/index.php"
    url += "?postcode=%s&huisnummer=%s" % (postcode, housenumber)
    url += "&client_id=%s&secure_code=%s" % (client_id, secure_code)
    url += "&remote_ip=%s" % socket.gethostbyname(socket.gethostname())

    response = requests.post(url)

    return response.text

postcode = "1014BA"
housenumber = 37

jsonResult = search(postcode, housenumber)

address = Address(jsonResult)

print "Straatnaam: %s" % address.straatnaam
print "Woonplaats: %s" % address.woonplaats