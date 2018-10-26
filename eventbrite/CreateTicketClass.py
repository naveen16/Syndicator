import requests
import json

head = {"Content-type":"application/json",
        "Accept":"application/json",
        "Authorization": "Bearer E2SYBS6O3VR3JNBYHV4Y"
       }

def createTicketClass(eid):
  urlTicket = "https://www.eventbriteapi.com/v3/events/"+str(eid)+"/ticket_classes/"
  d = {'ticket_class.name':'tclass', 'ticket_class.cost':'USD,500','ticket_class.quantity_total':10}
  tjson = json.dumps(d)
  response = requests.post(urlTicket,headers=head,data=tjson, verify = True)
  print(response.json())
  

createTicketClass('51795349284')
