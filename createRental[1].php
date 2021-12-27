<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {
            color: crimson;
        }
    </style>
</head>
<body>
    <?php
    //defining variables
    $cusFI = $cusLN = $cusPhone = "";
    $cusFIEr = $cusLNEr = $cusPhoneEr = "";

    $carType = $carAvail = $carStartDate = $carEndDate = $vehicleNum = "";
    $carTypeEr = $carAvailEr = $carStartDateEr = $carEndDateEr = $vehicleNumEr = "";

    if($_SERVER["Request_Method"] == "POST")
    {
        if(empty($_POST["cusFI"]))
        {
            $cusFIEr = "Enter the customer's first name initial";
        }else{
            $cusFI = test_inputRental($_POST["cusFI"]);
        }

        if(empty($_POST["cusLN"]))
        {
            $cusLNEr = "Enter the customer's last name:";
        }else{
            $cusLN = test_inputRental($_POST["cusLN"]);
        }

        if(empty($_POST["cusPhone"]))
        {
            $cusPhoneEr = "Enter the customer's phone number:";
        }else{
            $cusPhone = test_inputRental($_POST["cusPhone"]);
        }

        if(empty($_POST["carType"]))
        {
            $carTypeEr = "Choose the type of car you want to rent.";
        }else{
            $carType = test_inputRental($_POST["carType"]);
        }

        if(empty($_POST["carAvail"]))
        {
            $carAvailEr = "Choose the car's availability";
        }else{
            $carAvail = test_inputRental($_POST["carAvail"]);
        }

        if(empty($_POST["carStartDate"]))
        {
            $carStartDateEr = "Choose the rental's start date";
        }else{
            $carStartDate = test_inputRental($_POST["carStartDate"]);
        }

        if(empty($_POST["carEndDate"]))
        {
            $carEndDateEr = "Choose the rental's end date";
        }else{
            $carEndDate = test_inputRental($_POST["carEndDate"]);
        }

        if(empty($_POST["vehicleNum"]))
        {
            $vehicleNumEr = "Enter the car's vehicle number";
        }else{
            $vehicleNum = test_inputRental($_POST["vehicleNum"]);
        }
    }


    function test_inputRental($dataRental){
        $dataRental = trim($dataRental);
        $dataRental = stripslashes($dataRental);
        $dataRental = htmlspecialchars($dataRental);
        return $dataRental;
    }
    ?>

    <h2>Car Rental Form</h2>
    <p>
        Please enter the necessary details below:
        <span class="error">
            <br />*required field
        </span>
    </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        First name initial:
        <input type="text" name="cusFI" placeholder="J" />
        <span class="error">
            *<?php echo $cusFIEr;?>
        </span>
        <br />Last name:
        <input type="text" name="cusLN" placeholder="Doe" />
        <span class="error">
            *<?php echo $cusLNEr?>
        </span>
        <br />Phone number:
        <input type="text" name="cusPhone" placeholder="000-000-0000" />
        <br />Start Date:
        <input type="date" name="carStartDate" placeholder="YYYY-MM-DD" />
        <span class="error">
            *<?php echo $carStartDateEr?>
        </span>
        <br />End Date:
        <input type="date" name="carEndDate" placeholder="YYYY-MM-DD" />
        <span class="error">
            *<?php echo $carEndDateEr?>
        </span>

        <!--  IGNORE THIS -- THIS IS FOR THE USER TO SEE WHAT ARE THE AVAILABLE CARS PER TYPE BUT I CANT GET THE VEHICLE ID INPUT FORM TO WORK
            <br />Car Availability: <input type="radio" name="carAvail" value="Available" />Available <input type="radio" name="carAvail" value="Unavailable" />Unavailable <span class="error">*<?php echo $carAvailEr?></span>
        <br />Type: <select name="carType">
        <option value="select">select...</option>
        <option value="Compact">Compact</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <option value="SUV">SUV</option>
        <option value="Truck">Truck</option>
        <option value="Van">Van</option>-->
        <br />Enter the vehicle number you would like to rent:
        <input type='text' name='vehicleNum' placeholder='0000' />
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>

    <?php
    $cusFI = $_POST['cusFI'];
    $cusLN = $_POST['cusLN'];
    $cusPhone = $_POST['cusPhone'];

    $carType = $_POST['carType'];
    $carAvail = $_POST['carAvail'];
    $carStartDate = $_POST['carStartDate'];
    $carEndDate = $_POST['carEndDate'];
    $vehicleNum = $_POST['vehicleNum'];

    $serverRental = "localhost";
    $usernameRental = "root";
    $passwordRental = "";
    $dbnameRental = "carrentaldb";

    //Creating connection
    $connRental = new mysqli($servernameRental, $usernameRental, $passwordRental, $dbnameRental);

    //Checking connection
    if ($connRental->connect_error) {
        die("Connection failed: ") . $connRental->connect_error;
    }else{
        // a reminder for me that the database was loaded!
        echo "Database Connected!<br>";
    }

    //printing all the available cars. Sorry its not ordered... AND SORRY IT'S ALL OVER THE PLACE
    $availCar = "SELECT * FROM car WHERE Status = 'Available'";
    $result = $connRental ->query($availCar);
    if ($result)
    {
        echo "<h2>List of Available Cars</h2>";
        while($row = $result ->fetch_assoc())
        {
            echo "<b>Car Type: </b>".$row["Type"]." | <b>Vehicle No:</b> ".$row["Vehicle_ID"]." | <b>Model:</b> ".$row["Model"]." | <b>Year:</b> ".$row["Year"]."<br><br>";
        }
    }else{
        echo "0 results";
    }
?>

    <?php
    $submitRentalInfo = $_POST['submit'];
    /* IGNORE THIS ONE TOO - THIS WAS SUPPOSED TO BE FOR CREATING A NEW FORM WHEN THE USER INPUT THE VEHICLE NO.
     * if($submitRentalInfo == TRUE)
    {//ADD THE START AND END DATE
    $sql = "Select Vehicle_ID, Model, Year from car where Status = '$carAvail' and Type = '$carType'";
    $result = $connRental -> query($sql);
    if ($result)
    {
    echo  "<br><h2>Available Cars to Rent</h2></br>";// from this date to that date dont forget to add the dates available
    while($r = $result ->fetch_assoc())
    {
    echo "<b>Vehicle ID: </b>".$r['Vehicle_ID']. " <b> | Model: </b>".$r['Model']. "<b>      | Year: </b>".$r['Year']."<br>";
    //create a available and unavailable title
    }
    //GO BACKT TO THIS ONE
    $sql1 = "Insert into daily (Vehicle_No, ID_No, Start_Date, Return_Date, No_days, Amount_Due) VALUES ";

    }else
    {
    echo "0 Results";
    }
    }*/


    if($submitRentalInfo == TRUE){
        //to solve the day difference
        $dateDiff = round(abs(strtotime($carEndDate) - strtotime($carStartDate)) / (60 * 60 * 24));

        $sqlCustomer = "INSERT INTO customer (FN_Initial, Last_Name, Phone_No) VALUES ('$cusFI','$cusLN','$cusPhone')";
        if ($connRental ->query($sqlCustomer) === TRUE)
        {
            //retrieving the added customer ID
            $lastCustID = $connRental ->insert_id;
            echo"New Customer created successfully!<br>";
            echo "<h2>Added Customer Data: </h2>";
            echo "Customer ID: ".$lastCustID."<br>";
            echo "Name: ".$cusFI.". ".$cusLN. "<br>";
            echo "Phone: ".$cusPhone. "<br>";
        }else
        {
            echo "No data added";
        }

        if ($dateDiff < 7){
            $sqlRental = "INSERT INTO daily (Vehicle_ID,  ID_No, Start_Date, Return_Date, No_Days) VALUES ('$vehicleNum', '$lastCustID','$carStartDate', '$carEndDate', '$dateDiff')";
        }//this one is not working, only the daily
        elseif($dateDiff > 7){
            $sqlRental = "INSERT INTO weekly (Vehicle_ID,  ID_No, Start_Date, Return_Date, No_Weeks) VALUES ('$vehicleNum', '$lastCustID','$carStartDate', '$carEndDate', '$dateDiff')";
        }else{
            echo "<br>Try again</br>";
        }

        if($connRental ->query($sqlRental) == TRUE)
        {
            echo "Vehicle No: ".$vehicleNum."<br>";
            echo "Start Date: ".$carStartDate."<br>";
            echo "End Date: ".$carEndDate."<br>";
            echo "No of rental days: ".$dateDiff."<br>";
        }else{
            echo "No vehicle data added";
        }
    }
    ?>



</body>
</html>