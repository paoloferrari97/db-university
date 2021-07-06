<?php

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "università");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn && $conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error;
} else {
    echo "Connection Successful, Go!";
}

$sql = "SELECT * FROM `students` WHERE `students`.`name` LIKE 'P%'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["name"];
    }
} elseif ($results) {
    echo "0 results";
} else {
    echo "query error";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB-University</title>
</head>

<body>

</body>

</html>