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

jsonResult = search("1014BA", 37)

address = Address(jsonResult)

print "Straatnaam: %s" % address.straatnaam
print "Woonplaats: %s" % address.woonplaats