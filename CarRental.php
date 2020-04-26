<html>
<body>
<?php
echo "<h2>Car Rental Database</h2>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrentaldb";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn-> connect_error) {
  die("Connection failed: ". $conn->connect_error);
}
echo "Connected Successfully <br>";
echo "Showing the database results <br>";
echo "------------------------------<br>;
$sql = "Select ID_No, FN_Initial, Last_Name from customer";
%result = $conn -> query($sql);
if ($result)
{
  while($row = $result -> fetch_assoc())
    {
      echo "Id No: .$row["ID_No"]. " ". $row["FN_Initial"]. " " .$row["Last_Name"]. "<br>";
    }
}else 
{ 
  echo "0 results";
}

?>
</body>
</html>
