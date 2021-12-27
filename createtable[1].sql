CREATE TABLE car (
Vehicle_ID INT(11) AUTO_INCREMENT UNIQUE KEY, Model VARCHAR(25) NOT NULL, Year VARCHAR(4) NOT NULL,
Daily_Rate INT(11) NOT NULL, WEEKLY_RATE(11) NOT NULL, TIME_PERIOD DATE
STATUS VARCHAR(11) NOT NULL, TYPE VARCHAR(11) NOT NULL);

CREATE TABLE customer (
ID_NO INT(11) AUTO_INCREMENT UNIQUE KEY, Last_Name VARCHAR(24) NOT NULL, FN_Initial VARCHAR(2) NOT NULL, 
PHONE_No VARCHAR(12) NOT NULL);

