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


if(isset($_POST['SubmitButton'])){
 
$name=$_POST['name'];
$sql = "INSERT INTO shoutbox (name)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    $kazaka=["Прочети Библията и ще разбереш.","Учителят Дънов може да ти каже.","В ракиджока е отговорът.","Всичко във Вселената е свързано.","Дай един лист и химикал и ще ти обясня.","Това го решава Бог.","Това е проблем на молекулярно ниво.","Бълиго.","Пийни си една капачка и ще ти кажа.", "Първо разгледай библейските мотиви.","Това е въпрос за Исуската.","Защо те интересува бе, зайче?","Не знам, ама кайсиевата стана добре тая година.","Да, да, рибки са.","А ракийка искаш ли?"];
    echo "<p id='answer'>".$kazaka[array_rand($kazaka)]."</p>";
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
<input type="submit" id="submit" name="SubmitButton"/>
</form>


<?php
$sql = "SELECT id,name FROM shoutbox";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>



</body>
</html>
