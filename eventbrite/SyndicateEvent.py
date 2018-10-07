import requests
import json
import mysql.connector

eventbritecolumns = {
  'event_name':'event.name.html',
  'event_description':'event.description.html',
  'start_time':'event.start.utc',
  'start_timeTZ':'event.start.timezone',
  'end_time':'event.end.utc',
  'end_timeTZ':'event.end.timezone',
  'currency':'event.currency'
}

dbcols = ['event_name','event_description','start_time','start_timeTZ','end_time','end_timeTZ','currency']

url = "https://www.eventbriteapi.com/v3/organizations/275739530397/events/"
head = {"Content-type":"application/json",
        "Accept":"application/json",
        "Authorization": "Bearer E2SYBS6O3VR3JNBYHV4Y"
       }

def db2eventbrite():
    conn = mysql.connector.connect(host='localhost',user='ec2-user',passwd='pass',database='pulsd')
    c = conn.cursor()
    c.execute("SELECT * FROM event WHERE published='N'")
    cDesc = c.description
    rows = c.fetchall()
    ans = []
    for row in rows:
      print(row)
      d = {}
      for i,col in enumerate(cDesc):
        if col[0] not in dbcols:
	  print(col[0])
          continue
        d[eventbritecolumns[col[0]]] = row[i]
      ejson = json.dumps(d)
      response = requests.post(url,headers=head,data=ejson, verify = True)
      print(response)
      print(ejson)
      print(response.status_code)
      if response.status_code == 200:
          c.execute("UPDATE event set published='Y' where eid="+str(row[0]))
    conn.commit()
    conn.close()

db2eventbrite()

