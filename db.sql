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
  price Integer,
  published varchar(1),
  PRIMARY KEY (eid)
);

insert into event values('1','ename1','Bob','edesc','2019-10-06T13:00:00Z','America/Los_Angeles','2019-10-06T15:00:00Z','America/Los_Angeles','USD','v1','Y',1,'Y');
insert into event values('2','ename2','Joe','edesc','2019-10-06T13:00:00Z','America/Los_Angeles','2019-10-06T15:00:00Z','America/Los_Angeles','USD','v2','Y',1,'Y');
insert into event values('3','ename3','Sam','edesc','2019-10-06T13:00:00Z','America/Denver','2019-10-06T15:00:00Z','America/Denver','USD','v3','Y',1,'Y');
