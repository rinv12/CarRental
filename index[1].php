<html>
<body>
    <!--Car Rental Database by Loureen Viloria and Ahmed Salman-->

    <!--Car rental database form to assist the user on creating or updating info-->
    <h2>Welcome to Car Rental Services!</h2>
    <form action="index.php" method="post" id="selectedForm">
     What would you like to do today?<br>
        <select form="selectedForm" name="menu">
            <option value=""> select...</option>
            <option value="addCustomer">Add Customer</option>
            <option value="createRental">Create Rental</option>
            <option value="addCar">Add Car</option>
            <option value="returnRental">Return Rental</option>
            <option value="updateCar">Update Car</option>
            <option value="exit">No Transaction Needed</option>
        </select>
            <input type="submit" name="submit" value="Submit" />
    </form>
    
    <?php
    //if else condition based on the menu chosen
    $requestedForm = $_POST['menu'];

    //switch statement for menu form
    switch($requestedForm)
    {
        case "addCustomer":
            //will take the user to add customer page
            header("Location: addCustomer.php");
            break;
        case "createRental":
            //will take the user to create rental page where customer can add their info, and choose the car and date of rental
            header("Location: createRental.php");
            break;
        case "addCar":
            //add car page
            header("Location: addCar.php");
            break;
        case "returnRental":
            //return rental page and will show the customer's bill
            header("Location: returnRental.php");
            break;
        case "updateCar":
            //takes user to update car page where the user can update the prices of the cars
            header("Location: updateCar.php");
            break;
        case "exit":
            echo "Goodbye!";
            break;
    }
    ?>

</body>
</html>