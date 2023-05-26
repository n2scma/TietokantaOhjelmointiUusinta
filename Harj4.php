<?php
require "dbconnection.php";
$dbcon = createDbConnection();

try {
    $dbcon->beginTransaction();

    $sql1 = "UPDATE genres SET GenreId = ? WHERE id = ?";
    $statement1 = $dbcon->prepare($sql1);
    $statement1->execute(array("Uusi Arvo 1", 1));

    $sql2 = "INSERT INTO media_types (MediaTypeId, Name) VALUES (?, ?)";
    $statement2 = $dbcon->prepare($sql2);
    $statement2->execute(array("Testi syöttö 1", "Testi syöttö 2"));

    $dbcon->commit();

    echo "Transaction completed successfully.";
} catch (PDOException $e) {
    $dbcon->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
?>