<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error{color:darkred;}
    </style>
</head>
<body>

    <?php
    //defining variables
    $model = $year = $dRate = $wRate = $tPeriod = $status = $type = "";
    $modelErr = $yearErr = $dRateErr = $wRateErr = $tPeriodErr = $statusErr = $typeErr = "";

    //this is to make sure that the all fields or required fields are filled
    if ($_SERVER["Request_Method"] == "POST")
    {
        if(empty($_POST["model"]))
        {
            $modelErr = "Enter the model of the car.";
        }else{
            $model = test_input($_POST["model"]);
        }

        if(empty($_POST["year"]))
        {
            $yearErr = "Enter the year of the car.";
        }else{
            $year = test_input($_POST["year"]);
        }

        if(empty($_POST["dRate"]))
        {
            $dRateErr = "Enter the daily rate of the car.";
        }else{
            $dRate = test_input($_POST["dRate"]);
        }

        if(empty($_POST["wRate"]))
        {
            $wRateErr = "Enter the weekly rate of the car.";
        }else{
            $wRate = test_input($_POST["wRate"]);
        }

        if(empty($_POST["tPeriod"]))
        {
            $tPeriodErr = "Enter the time period of the car.";
        }else{
            $tPeriod = test_input($_POST["tPeriod"]);
        }

        if(empty($_POST["status"]))
        {
            $statusErr = "Enter the status of the car.";
        }else{
            $status = test_input($_POST["status"]);
        }

        if(empty($_POST["type"]))
        {
            $typeErr = "Enter the type of the car.";
        }else{
            $type = test_input($_POST["type"]);
        }
    }

    function test_input($dataCar){
        $dataCar = trim($dataCar);
        $dataCar = stripslashes($dataCar);
        $dataCar = htmlspecialchars($dataCar);
        return $dataCar;
    }
    ?>
    <!--Form for adding a new car-->
    <h2>Welcome to Add a New Car Page!</h2>
    <p>
        Please enter the all the required data below:
        <span class="error"><br />* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Model: <input type="text" name="model" placeholder="Toyota Corolla, Mitsubishi Lancer, Ford Mustang" /> <span class="error">*<?php echo $modelErr?></span>
        Year: <input type="number" name="year" placeholder="2019" /><span class="error">*<?php echo $yearErr ?></span><br />
        Daily Rate: <input type="number" name="dRate" /><span class="error">*<?php echo $dRateErr ?></span><small><br />Rates:  Compact: 20 | Medium: 25    |   Large: 30   |   SUV: 35 |   Truck: 45   |   Van: 50<br /></small>
        Weekly Rate: <input type="number" name="wRate" /><span class="error">*<?php echo $wRateErr?></span><small><br />Rates:  Compact: 140    |   Medium: 175 |   Large: 210  |   SUV: 245    |   Truck: 315  |   Van: 350<br /></small>
        Time period: <input type="text" name="tPeriod" /><br />
        Status: <input name="status" type="radio" value="Available" />Available <input type="radio" name="status" value="Unavailable" />Unavailable<br />
        Type: <select name="type">
        <option value="select">select...</option>
        <option value="Compact">Compact</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <option value="SUV">SUV</option>
        <option value="Truck">Truck</option>
        <option value="Van">Van</option>
        </select>
        <br /><input type="submit" name="submit" value="Submit" />
    </form>

    <?php
    $model = $_POST['model'];
    $year = $_POST['year'];
    $dRate = $_POST['dRate'];
    $wRate = $_POST['wRate'];
    $tPeriod = $_POST['tPeriod'];
    $status = $_POST['status'];
    $type = $_POST['type'];

    //variables
    $servernameACar = "localhost";
    $usernameACar = "root";
    $passwordACar = "";
    $dbnameACar = "carrentaldb";

    //Creating connection
    $conn = new mysqli($servernameACar, $usernameACar, $passwordACar, $dbnameACar);

    //Checking connection
    if ($conn->connect_error) {
        die("Connection failed: ") . $conn->connect_error;
    } else{
        // a reminder for me that the database was loaded!
        echo "Database Connected!<br>";
    }

    $submitCarInfo = $_POST['submit'];
    if($submitCarInfo == TRUE)
    {
        $sql = "INSERT INTO car (Model, Year, Daily_Rate, Weekly_Rate, Time_Period, Status, Type) VALUES ('$model', '$year', '$dRate', '$wRate', '$tPeriod', '$status', '$type')";
        if ($conn ->query($sql)=== TRUE)
        {
            //retrieving added vehicle_ID
            $lastV_ID = $conn ->insert_id;
            echo "New Car added successfully!";
            echo "<h2>Added Car Data: </h2>";
            echo "Vehicle ID: ".$lastV_ID."<br>";
            echo "Model: ".$model."<br>";
            echo "Year: ".$year."<br>";
            echo "Daily Rate: $". $dRate."<br>";
            echo "Weekly Rate: $". $wRate."<br>";
            echo "Time Period: ".$tPeriod."<br>";
            echo "Status: ".$status."<br>";
            echo "Type: ".$type."<br>";
        }
    }
    ?>
</body>
</html>