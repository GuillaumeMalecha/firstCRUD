<?php
$servername = "127.0.0.1";
$username = "user1";
$password = "user1";
$dbname = "poo_db_1";


class Furniture {
    private $name;
    private $description;
    private $price;
    private $vat;

    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $methodName = "set" . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }
}
