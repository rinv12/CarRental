SELECT * FROM car;
SELECT * FROM customer;

##all other select queries used in the code##

##From Create Rental##
SELECT * FROM car WHERE Status = 'Available';

##From return rental##
SELECT daily.*, customer.*, weekly.* FROM customer, daily, weekly WHERE customer.Last_Name = '$rLName' AND customer.ID_No = '$rID' AND daily.ID_No = '$rID' or weekly.ID_No = '$rID';

