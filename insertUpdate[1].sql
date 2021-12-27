##ALL QUERIES USED --FROM PHP CODE##
##ADD CAR##
INSERT INTO car (Model, Year, Daily_Rate, Weekly_Rate, Time_Period, Status, Type) VALUES ('$model', '$year', '$dRate', '$wRate', '$tPeriod', '$status', '$type');

##CREATE RENTAL##
INSERT INTO daily (Vehicle_ID,  ID_No, Start_Date, Return_Date, No_Days) VALUES ('$vehicleNum', '$lasCustID','$carStartDate', '$carEndDate', '$dateDiff');

##RETURN RENTAL##
UPDATE car SET Status = 'Available' WHERE Vehicle_ID = '$vehicleID';

##UPDATE CAR##
UPDATE car SET Daily_Rate = '$updatePrice', Weekly_Rate = '$updateWeeklyPrice' Where Type = '$cType';  

##ADD CUSTOMER##
INSERT INTO customer (FN_Initial, Last_Name, Phone_No) VALUES ('$fInitial','$lname','$phone');
