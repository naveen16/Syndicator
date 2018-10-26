import requests
import json
import mysql.connector
import time

eventbritecolumns = {
  'event_name':'event.name.html',
  'event_description':'event.description.html',
  'start_time':'event.start.utc',
  'start_timeTZ':'event.start.timezone',
  'end_time':'event.end.utc',
  'end_timeTZ':'event.end.timezone',
  'currency':'event.currency',
  'venue_id':'event.venue_id'
}

dbcols = ['event_name','event_description','start_time','start_timeTZ','end_time','end_timeTZ','currency','venue_id','price']

url = "https://www.eventbriteapi.com/v3/organizations/275739530397/events/"
head = {"Content-type":"application/json",
        "Accept":"application/json",
        "Authorization": "Bearer E2SYBS6O3VR3JNBYHV4Y"
       }

urlVenue = "https://www.eventbriteapi.com/v3/organizations/275739530397/venues/"

def createVenue(vid):
   d = {'venue.name':vid}
   vjson = json.dumps(d)
   response = requests.post(urlVenue,headers=head,data=vjson, verify = True)
   #print("RESPONSE JSON: "+str(response.json()))
   #print("RESPONSE JSON: "+str(response.json()['id']))
   return response.json()['id']


def createTicketClass(eid,currency,price):
  urlTicket = "https://www.eventbriteapi.com/v3/events/"+str(eid)+"/ticket_classes/"
  d = {'ticket_class.name':'tclass', 'ticket_class.quantity_total':10}
  d['ticket_class.cost'] = currency+","+str(price)
  tjson = json.dumps(d)
  print("TJSON: "+str(tjson))
  response = requests.post(urlTicket,headers=head,data=tjson, verify = True)
  print(response.json())

def db2eventbrite():
    conn = mysql.connector.connect(host='localhost',user='ec2-user',passwd='pass',database='pulsd')
    c = conn.cursor()
    c.execute("SELECT * FROM event WHERE published='N'")
    cDesc = c.description
    rows = c.fetchall()
    price = 0
    ans = []
    for row in rows:
      print(row)
      d = {}
      for i,col in enumerate(cDesc):
        if col[0] not in dbcols:
          print(col[0])
          continue
        if col[0] == 'venue_id':
          d[eventbritecolumns[col[0]]] = createVenue(row[i])
          continue
        if col[0] == 'price':
          print(col[0])
          #price denoted in number of cents
          price = int(float(row[i])*100)
          continue
        d[eventbritecolumns[col[0]]] = row[i]
      ejson = json.dumps(d)
      response = requests.post(url,headers=head,data=ejson, verify = True)
      print(response)
      print(ejson)
      print(response.status_code)
      print(response.json())
      createTicketClass(response.json()['id'],response.json()['currency'],price)
      if response.status_code == 200:
          c.execute("UPDATE event set published='Y' where eid="+str(row[0]))
    conn.commit()
    conn.close()

db2eventbrite()

