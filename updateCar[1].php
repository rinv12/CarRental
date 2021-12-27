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
    $cType = "";
    $cTypeEr = "";

    $updatePrice = 0;
    $updatePriceEr = 0;

    $updateRate = "";
    $updateRateEr = "";

    //this is to make sure that the all fields or required fields are filled
    if($_SERVER["Request_Method"] == "POST")
    {
        if(empty($_POST["updatePrice"]))
        {
            $updatePriceEr = "Enter the updated daily rental rate";
        }else{
            $updatePrice = test_inputUpdateCar($_POST["updateWeekly"]);
        }

        if(empty($_POST["cType"]))
        {
            $cTypeEr = "Please choose the type of car you would like to update the price";
        }else{
            $cType = test_inputUpdateCar($_POST["cType"]);
        }
    }

    function test_inputUpdateCar($dataUpdate){
        $dataUpdate = trim($dataUpdate);
        $dataUpdate = stripslashes($dataUpdate);
        $dataUpdate = htmlspecialchars($dataUpdate);
        return $dataUpdate;
    }
    ?>
    
    <h2>Updating Car Rental Rates</h2>
    <p>
        Please choose from the following
    <span class="error">
    <br />* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    What type of car you would like to update it's rental price?<br />
      <select name="cType">
        <option value="select">select...</option>
        <option value="Compact">Compact</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <option value="SUV">SUV</option>
        <option value="Truck">Truck</option>
        <option value="Van">Van</option>
        </select><br />
    <br />Enter the price: <input type="number" name="updatePrice"/><small>Please enter the daily price only it will be multiplied by 7 for weekly</small>
    <br /><input type="submit" name="submit" value="Submit" />
        </form>

    <?php

    //giving values to variables
    $cType = $_POST["cType"];
    $updatePrice = $_POST["updatePrice"];
    $updateWeeklyPrice = $updatePrice * 7;

    //database variables
    $servernameUpdate = "localhost";
    $usernameUpdate = "root";
    $passwordUpdate = "";
    $dbnameUpdate = "carrentaldb";

    //Creating connection
    $connUpdate = new mysqli($servernameUpdate, $usernameUpdate, $passwordUpdate, $dbnameUpdate);

    //Checking connection
    if ($connUpdate->connect_error) {
        die("Connection failed: ") . $connUpdate->connect_error;
    } else
    {
        echo "Database Connected!<br>";
    }

    $submitUpdatedInfo = $_POST['submit'];
    if($submitUpdatedInfo == TRUE)
    {
        $sqlUp = "UPDATE car SET Daily_Rate = '$updatePrice', Weekly_Rate = '$updateWeeklyPrice' Where Type = '$cType'";  
        if (mysqli_query($connUpdate,$sqlUp)){
            //this will print if the sql query is successful
            echo "<br>Daily and Weekly rental price updated successfully!";
        }else{
            //this will print if the the record update is unsuccessful
            echo "<br>Error updating record" . mysqli_error($connUpdate);
        }
    }
    ?>

</body>
</html>