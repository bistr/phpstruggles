<?php
$servername = "sql305.byethost32.com";
$username = "b32_20212869";
$password = "6ampoana";
$dbname = "b32_20212869_shoutboom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name=$_POST['name'];
$email=$_POST['email'];
$sql = "INSERT INTO shoutbox (name,post)
VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo $_POST["name"];
    

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>	
