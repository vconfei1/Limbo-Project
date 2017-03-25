--#Victoria Confeiteiro and Jessica Reiger
--#Limbo Project
--#Version: 1
--#12/6/2016
--#Purpose: Creating and populating the limbo database

--#creating the limbo database
drop database if exists limbo_db ;
create database limbo_db ;
use limbo_db;

drop table if exists users;
drop table if exists super;
drop table if exists locations;
drop table if exists stuff;

--#creating users(admin) table
create table if not exists users(
  user_id INT AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  first_name VARCHAR(20) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(60) NOT NULL,
  pass CHAR(40) NOT NULL,
  reg_date DATETIME NOT NULL,
  securityquestion text NOT NULL,
  response text NOT NULL,
  PRIMARY KEY (user_id)
  );
  

INSERT INTO users (username, pass, first_name, last_name, email, SecurityQuestion, Response)
VALUES ('Jess', SHA1('1234'), 'Jessica', 'Reiger', 'j.reiger11@marist.edu', 'What is your favorite color?', 'Blue');

INSERT INTO users (username, pass, first_name, last_name, email, SecurityQuestion, Response)
VALUES ('Joe', SHA1('usa'), 'Joseph', 'Smith', 'joe.smith1@marist.edu', 'What is your favorite animal?', 'Dog');

INSERT INTO users (username, pass, first_name, last_name, email, SecurityQuestion, Response)
VALUES ('Vic', SHA1('yonkers'), 'Victoria', 'Confeiteiro', 'victoria.confeiteiro1@marist.edu', 'What is your favorite food?', 'Pizza');

INSERT INTO users (username, pass, first_name, last_name, email, SecurityQuestion, Response)
VALUES ('admin', SHA1('gaze11e'), 'Casimer', 'DeCusatis', 'casimer.decusatis@marist.edu', 'What is your favorite color?', 'Green');

--#create super admin table
create table if not exists super(
  sa_id INT AUTO_INCREMENT,
  sa_username VARCHAR(20) NOT NULL,
  sa_fname VARCHAR(20) NOT NULL,
  sa_lname VARCHAR(40) NOT NULL,
  sa_email VARCHAR(60) NOT NULL,
  sa_pass VARCHAR(40) NOT NULL,
  sa_reg_date DATETIME NOT NULL,
  sa_securityquestion text NOT NULL,
  sa_response text NOT NULL,
  PRIMARY KEY (sa_id),
  UNIQUE (sa_email)
  );
  
INSERT INTO super (sa_username, sa_pass, sa_fname, sa_lname, sa_email, sa_securityquestion, sa_response)
VALUES ('Vic', SHA1('1129'), 'Victoria', 'Confeiteiro', 'victoria.confeiteiro1@marist.edu', 'What is your favorite food?', 'Pizza'); 

INSERT INTO super (sa_username, sa_pass, sa_fname, sa_lname, sa_email, sa_securityquestion, sa_response)
VALUES ('admin', SHA1('gaze11e'), 'Casimer', 'DeCusatis', 'casimer.decusatis@marist.edu', 'What is your favorite color?', 'Green');  
  
  
--#create locations table
create table if not exists locations(
  id INT AUTO_INCREMENT,
  create_date DATETIME NOT NULL,
  update_date  DATETIME NOT NULL,
  name TEXT NOT NULL,
  PRIMARY KEY (id)
  );
 
 --#create stuff table
create table if not exists stuff(
  id INT AUTO_INCREMENT,
  location_id INT NOT NULL,
  create_date DATETIME NOT NULL,
  update_date  DATETIME NOT NULL,
  finder TEXT,
  fPhoneNumber TEXT,
  fEmail TEXT,
  room TEXT,
  owner TEXT,
  oPhoneNumber Text,
  oEmail TEXT,
  Icat TEXT,
  Iname TEXT,
  descr TEXT,
  Ilocation TEXT,
  LostDate Date,
  FoundDate Date,
  status TEXT,
  PRIMARY KEY (id)
  );

  explain stuff;
  

--#populate stuff table
INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, FoundDate, finder, fPhoneNumber, fEmail, room, status)
VALUES (30, Now(), Now(),'clothing', 'scarf', 'blue, pink and yellow', 'Hancock', '2016-07-11', 'Jessica Rieger', '315-123-4567', 'Jess.riegs@gmail.com', 'HC2020', "Found");

INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, FoundDate, finder, fPhoneNumber, fEmail, room, status)
VALUES (30, Now(), Now(), 'Jewelry', 'necklace', 'gold', 'Hancock', '2016-01-11','Victoria Confeiteiro', '410-395-1938', 'vic.con@gmail.com','HC2023', "Found");

INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, FoundDate, finder, fPhoneNumber, fEmail, room, status)
VALUES (1, Now(), Now(),'electronic device', 'camera', 'Cannon', 'Beck Parking Lot', '2016-07-11', 'James Bond', '410-395-2338', 'jam.bon@gmail.com', 'Unknown', "Found");

INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, LostDate, room, owner, oPhoneNumber, oEmail, status)
VALUES (29, Now(), Now(),'Misc.', 'mug', 'Marist Mug', 'Fontaine', '2016-02-11', 'FN201', 'Mary Lux', '429-398-3947', 'mar.lux@gmail.com', "Lost");

INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, LostDate, room, owner, oPhoneNumber, oEmail, status)
VALUES (1, Now(), Now(),'Bag', 'purse', 'Coach', 'Beck Parking Lot', '2016-02-10', 'Unknown', 'Jamie Whelan', '429-398-9047', 'jam.whelan@gmail.com', "Lost");

INSERT INTO stuff (location_id, create_date, update_date, Icat, Iname, descr, ILocation, LostDate, room, owner, oPhoneNumber, oEmail, status)
VALUES (2, Now(), Now(),'Electronic Device', 'Computer', 'MacBook', 'Champagnat Hall', '2016-02-10', '212', 'Sarah Marron', '429-908-9047', 'sar.marron@gmail.com', "Lost");

--#Populate locations table
    
INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Beck Parking Lot');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Benoit and Gregory Houses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Byrne House');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Champagnat Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Donnelly Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Dyson');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Fern Tor');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Sheahan');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Upper West Cedar Townhouses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Lower West Cedar Townhouses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Student Center');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Steel Plant Studio');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), "St. Peter's");

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), "St. Ann's Hermitage");

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Our Lady Seat of Wisdom Chapel');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Upper New Townhouses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Lower New Townhouses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'The Martin Boathouse');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Marian Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Lowell Thomas Center');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Leonidoff Field');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Leo Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'The Kirk Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Kieran Gatehouse');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'McCann Recreation Center');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'James A. Cannavino Library');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Greystone');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'New Gartland');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Foy Townhouses');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Fontaine');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Hancock');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Midrise Hall');

INSERT INTO locations (create_date, update_date, name)
VALUES (Now(), Now(), 'Dining Hall');

--#Display all tables in database

SELECT *
FROM users;

SELECT *
FROM super;

SELECT *
FROM locations;

SELECT *
FROM stuff;