## Syndicator

To access the syndicator visit the following link:
<a href="http://ec2-18-236-89-7.us-west-2.compute.amazonaws.com/pulsd/" target="_blank">Event Syndicator</a>

#### System Architecture

<p align="center">
  <img src="https://github.com/naveen16/Syndicator/blob/master/img/eventFigure.jpeg" title="hover text">
</p>

#### Project Description

Application to syndicate events created on pulsd to other event websites. The front end webpage uses HTML to create events as well as querying the database for events. The php backend processes this data and writes the events to the mySQL database. 

Database schema:
```
DROP TABLE IF EXISTS event;
CREATE TABLE event (
  eid INTEGER,
  event_name varchar(50),
  organizer_name varchar(30),
  event_description varchar(256),
  start_time varchar(30),
  start_timeTZ varchar(30),
  end_time varchar(30),
  end_timeTZ varchar(30),
  currency varchar(3),
  venue_id varchar(30),
  test_event varchar(1),
  published varchar(1),
  PRIMARY KEY (eid)
);
```
Notes:
1. eid is auto generated incrementally starting at 1
2. published column holds 'Y' or 'N' indicating whether or not the event has been syndicated, starts with value 'N'
3. columns are the minimum required fields of each event website service

#### Publishing to event sites

Python program reads the mySQL databse for unpublished events and calls the event websites REST api to publish the event. After they are published the mySQL db is marked as published.

#### Cron job
A cron job is set up on the server with the following specification:
```
*/5 * * * * /usr/bin/python /var/www/html/pulsd/eventbrite/SyndicateEvent.py
```
which runs the python program every 5 minutes.

#### Assumptions/Comments

1. Currently only syndicates events to Eventbrite, extra columns not used by eventbrite are unused
2. Unable to syndicate to any other event website. Found api's for a few(ticketmaster.com,seatgeek.com), but they only allowed GET's 
   and did not allow for adding new events.
3. Events added to eventbrite are added as drafts and not made public to avoid clutter on their webpage
4. Service is hosted on Amazon AWS server
5. Assumes user inputs all mandatory fields and end time is after start time
6. DB currently has a few events in it 
