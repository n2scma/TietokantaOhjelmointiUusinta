<?php
require "dbconnection.php";
$dbcon = createDbConnection();

$searchCriteria1 = "F";
$searchCriteria2 = "Chicago";

$sql = "SELECT * FROM customers WHERE FirstName LIKE ? AND City = ?";
$statement = $dbcon->prepare($sql);
$statement->execute(array("$searchCriteria1%", $searchCriteria2));

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$response = array(
    'data' => $results
);

$jsonResponse = json_encode($response);

header('Content-type: application/json');
echo $jsonResponse;
?>