import requests
response = requests.get(
    "https://www.eventbriteapi.com/v3/users/me/owned_events/",
    headers = {
        "Authorization": "Bearer E2SYBS6O3VR3JNBYHV4Y",
    },
    verify = True,  # Verify SSL certificate
)
for e in response.json()['events']:
  print(e['name']['text'])

