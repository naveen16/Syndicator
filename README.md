## Syndicator

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

#### Assumptions
