<?php

$servername = "sql305.byethost32.com";
$username = "b32_20212869";
$password = "notreal";
$dbname = "b32_20212869_shoutboom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_POST['SubmitButton'])){
 
$name=$_POST['name'];
$email=$_POST['email'];
$sql = "INSERT INTO shoutbox (name,post)
VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully, ";
    echo $_POST["name"];
    

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
?>	


<html>
<head>
<style>
body{
background-color:white;
}
</style>
</head>
<body>

<form action="" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit" name="SubmitButton"/>
</form>

<?php
$sql = "SELECT id,name,post FROM shoutbox";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]." ".$row["post"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
