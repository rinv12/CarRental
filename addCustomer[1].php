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
    $fInitial = $lname = $phone = "";
    $fiError = $lnError = $pError = "";

    //this is to make sure that the all fields or required fields are filled
    if($_SERVER["Request_Method"] == "POST")
    {
        if (empty($_POST["fnInitial"]))
        {
            $fiError = "Enter the first letter of your first name.";
        }else{
            $fInitial = test_input($_POST["fnInitial"]);
        }

        if(empty($_POST["lname"]))
        {
            $lnError = "Enter your last name.";
        }else{
            $lname = test_input($_POST["lname"]);
        }

        if(empty($_POST["phone"]))
        {
            $pError = "Enter your phone number, ex: 000-000-0000.";
        }else{
            $phone = test_input($_POST["phone"]);
        }
    }

    function test_input($dataCustomer){
        $dataCustomer = trim($dataCustomer);
        $dataCustomer = stripslashes($dataCustomer);
        $dataCustomer = htmlspecialchars($dataCustomer);
        return $dataCustomer;
    }
    ?>

    <h2>Welcome to Create a New Customer Page!</h2>
    <p>
        Please enter the necessary details below:
        <span class="error">
            <br />* required field
        </span>
    </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        First name initial:
        <input type="text" name="fnInitial" placeholder="J" />
        <span class="error">
            *<?php echo $fiError;?>
        </span>
        <br />Last name:
        <input type="text" name="lname" placeholder="Doe" />
        <span class="error">
            *<?php echo $lnError?>
        </span>
        <br />Phone number:
        <input type="text" name="phone" placeholder="000-000-0000" />
        <span class="error">
            *<?php echo $pError?>
        </span>
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>

    <?php

    //giving values to variables
    $fInitial = $_POST['fnInitial'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];

    //sql connection variables
    $servernameAC = "localhost";
    $usernameAC = "root";
    $passwordAC = "";
    $dbnameAC = "carrentaldb";

    //Creating connection
    $connAC = new mysqli($servernameAC, $usernameAC, $passwordAC, $dbnameAC);

    //Checking connection
    if ($connAC->connect_error) {
        die("Connection failed: ") . $connAC->connect_error;
    } else{
        // a reminder for me that the database was loaded!
        echo "Database connected! <br>";
    }


    //once the user submits the info this should automatically added to the car rental database
    $submitCustomerInfo = $_POST['submit'];
    if ($submitCustomerInfo == TRUE)
    {
        $sql = "INSERT INTO customer (FN_Initial, Last_Name, Phone_No) VALUES ('$fInitial','$lname','$phone')";
        if ($connAC ->query($sql) === TRUE)
        {
            //retrieving the added customer ID
            $lastID = $connAC ->insert_id;
            echo"New Customer created successfully!<br>";
            echo "<h2>Added Customer Data: </h2>";
            echo "Customer ID: ".$lastID."<br>";
            echo "Name: ".$fInitial.". ".$lname. "<br>";
            echo "Phone: ".$phone. "<br>";
        }
    }
    ?>
</body>
</html>