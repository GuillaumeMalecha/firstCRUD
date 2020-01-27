<?php
require("Address.php");
require("AddressManager.php");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "poo_db_adress";
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}
catch(PDOException $e)
{
    echo $connection . "<br>" . $e->getMessage();
}

$adressManager = new addressManager($connection);

//New address
/*$adress = new Address();

$adress->setStreet("Rue Hopkins");
$adress->setNumber(12);
$adress->setCity("Bruxelles");
$adress->setZip(1000);

$adressManager->create($adress);
*/

//Read address
/*$readAdress = $adressManager->readAll();
if(!empty($readAdress)){
    $adress = new Adress();
    foreach ($readAdress as $adress){
        echo $adress->getId()." ".$adress->getStreet()." ".$adress->getNumber()." ".$adress->getZip()." ".$adress->getCity()."\n";

    }
}
*/






?>