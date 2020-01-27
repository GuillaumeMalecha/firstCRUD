<?php

$pdo = new PDO('mysql:host=localhost:3306;dbname=poo_db_1', "user1", "user1");
$query = "SELECT * FROM products";
$results = $pdo->query($query);

echo "id\rname\rdescription\rprice\rvat</br>";
echo "-----------------------------------------------</br>";
while ($row = $results->fetch()) {
    echo $row['name'];
    echo "\r". $row['description'];
    echo "\r". $row['price'];
    echo "\r". $row['vat'];
    echo "</br>";
}
