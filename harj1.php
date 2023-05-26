<?php

require "dbconnection.php";
$dbcon = createDbConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['name'])) {
        $name = $data['name'];
        
        $sql = "INSERT INTO artists (Name) VALUES (?)";
        $statement = $dbcon->prepare($sql);
        $statement->execute(array($name));
        
        echo "Row added to the 'artists' table.";
    } else {
        echo "Missing required field 'name' in the request data.";
    }
} else {
    echo "Invalid request method. Expected POST.";
}
