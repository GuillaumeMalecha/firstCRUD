<?php
class AddressManager{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }



    //Create
    public function create(Address $address)
    {
        $stmt = $this->getConnection()->prepare(
            'INSERT INTO adresses
       (street, zip, number, city)
       VALUES (
           :street,:zip,:number,:city
       )'
        );
        $stmt->bindValue(":street", $address->getStreet());
        $stmt->bindValue(":zip", $address->getZip(), PDO::PARAM_INT);
        $stmt->bindValue(":number", $address->getNumber(), PDO::PARAM_INT);
        $stmt->bindValue(":city", $address->getCity());

        $stmt->execute();
    }

    //Read
    public function retrieveById($id)
    {
        $id = (int)$id;

        $query = $this->getConnection()->query(
            'SELECT id, street, number, city, zip' .
            'FROM Adress WHERE id = ' . $id);
        $query->setFetchMode(PDO :: FETCH_CLASS, 'address');
        return $query->fetch();
    }

    //Read all
    public function readAll() {
        $address = array();
        $query = $this->getConnection()->query(
            'SELECT id, street, number, city, zip
            FROM adresses ');
        $query->setFetchMode(PDO::FETCH_CLASS, 'address');
        while ($data = $query->fetch()) {
            $adress[] = $data;
        }

        return $adress;
    }

    //Update
    public function update(Address $address) {
        $query = $this->getConnection()->prepare(
            'UPDATE adresses SET ' .
            'street=:street,' .
            'number=:number,' .
            'city=:city,' .
            'zip=:zip ' .
            'WHERE id=:id'
        );

        $query->bindValue(':street', $address->getStreet(), PDO::PARAM_INT);
        $query->bindValue(':number', $address->getNumber());
        $query->bindValue(':city', $address->getCity(), PDO::PARAM_INT);
        $query->bindValue(':zip', $address->getZip());

        $query->execute();
    }

    //Delete
    public function delete(Address $address) {
        $this->getConnection()->exec(
            'DELETE FROM adresses ' .
            'WHERE id = ' . $address->getId()
        );
    }




}
