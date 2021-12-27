<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {
            color: darkred;
        }
    </style>
</head>

<body>
    <?php
    //defining variables
    $rID = $rFInitial = $rLName = $rPhone = "";
    $rIDEr = $rFInitialEr = $rLNameEr = $rPhoneEr = "";

    if($_SERVER["Request_Method"] == "POST")
    {
        if(empty($_POST["rID"]))
        {
            $rIDEr = "Enter customer ID";
        }else{
            $rID = test_inputReturnRental($_POST["rID"]);
        }

        if(empty($_POST["rFInitial"]))
        {
            $rFInitialEr = "Enter customer's first name initial";
        }else {
            $rFInitial = test_inputReturnRental($_POST["rFInitial"]);
        }

        if(empty($_POST["rLName"]))
        {
            $rLNameEr = "Enter customer's last name";
        }else {
            $rLName = test_inputReturnRental($_POST["rLName"]);
        }

        if(empty($_POST["rPhone"]))
        {
            $rPhoneEr = "Enter customer's phone number";
        }else {
            $rPhone = test_inputReturnRental($_POST["rPhone"]);
        }

    }

    function test_inputReturnRental($dataRental){
        $dataRental = trim($dataRental);
        $dataRental = stripslashes($dataRental);
        $dataRental = htmlspecialchars($dataRental);
        return $dataRental;
    }
    ?>

    <h2>Return Rental Page</h2>
    <span class="error">
        <br />* required field
    </span>
    <form method="post">
        <br />Customer ID:
        <input type="text" name="rID" />
        <span class="error">
            *<?php echo $rIDEr;?>
        </span>
        <br />Customer First name initial:
        <input type="text" name="rFInitial" />
        <span class="error">
            *<?php echo $rFInitialEr;?>
        </span>
        <br />Customer Last name:
        <input type="text" name="rLName" />
        <span class="error">
            *<?php echo $rLNameEr;?>
        </span>
        <br />Customer Phone Number:
        <input type="text" name="rPhone" />
        <span class="error">
            *<?php echo $rPhoneEr;?>
        </span>
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>

    <?php
    $rID = $_POST["rID"];
    $rFInitial = $_POST["rFInitial"];
    $rLName = $_POST["rLName"];
    $rPhone = $_POST["rPhone"];

    $servName = "localhost";
    $servUserName = "root";
    $servPass = "";
    $servDB = "carrentaldb";

    $conRRent = new mysqli($servername, $servUserName, $servPass, $servDB);

    //Checking connection
    if ($conRRent->connect_error) {
        die("Connection failed: ") . $conRRent->connect_error;
    }else{
        //just a friendly reminder that the DB is connected
        echo "<br>Database connected!<br>";
    }

    $submitReturnInfo = $_POST['submit'];
    if($submitReturnInfo == TRUE)
    {
        //query to get info based on user input

        /*I used V. Price information*/
        $sqlReturn = "SELECT daily.*, customer.*, weekly.* FROM customer, daily, weekly WHERE customer.Last_Name = '$rLName' AND customer.ID_No = '$rID' AND daily.ID_No = '$rID' or weekly.ID_No = '$rID'";
        $rental = $conRRent ->query($sqlReturn);
        if ($rental)
        {
            while($return = $rental -> fetch_assoc())
            {
                echo "<br>Customer name: ".$return["FN_Initial"]. " ".$return["Last_Name"]."<br>";
                echo "Phone no: ". $return["Phone_No"]."<br>";
                echo "Vehicle No: ".$return["Vehicle_ID"]."<br>";
                echo "Amount Due: ".$return["Amount_Due"]."<br>";

                //change status of rented cars to available
                $vehicleID = $return["Vehicle_ID"];
                $sqlCarReturn = "UPDATE car SET Status = 'Available' WHERE Vehicle_ID = '$vehicleID'";
                $carReturn = $conRRent ->query($sqlCarReturn);
                if($carReturn)
                {
                    echo "<br><br>Car successfully returned!</br>";
                }else {
                    echo "<br>Car not returned</br>";
                }
            }

        }else{
            echo "No data collected";
        }

    }

    ?>

</body>
</html>