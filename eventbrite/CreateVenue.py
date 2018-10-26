import requests
import json

url = "https://www.eventbriteapi.com/v3/organizations/275739530397/venues/"
head = {"Content-type":"application/json",
        "Accept":"application/json",
        "Authorization": "Bearer E2SYBS6O3VR3JNBYHV4Y"
       }

def createVenue(venue):
  d = {"venue.name":venue}
  vjson = json.dumps(d)
  response = requests.post(url,headers=head,data=vjson, verify = True)
  print(response.json()['id'])

createVenue("Yankee Stadium")
