<?php
class AdressManager{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }



    //Create
    public function create(Adress $adress)
    {
        $stmt = $this->getConnection()->prepare(
            'INSERT INTO adresses
       (street, zip, number, city)
       VALUES (
           :street,:zip,:number,:city
       )'
        );
        $stmt->bindValue(":street", $adress->getStreet());
        $stmt->bindValue(":zip", $adress->getZip(), PDO::PARAM_INT);
        $stmt->bindValue(":number", $adress->getNumber(), PDO::PARAM_INT);
        $stmt->bindValue(":city", $adress->getCity());

        $stmt->execute();
    }

    //Read
    public function retrieveById($id)
    {
        $id = (int)$id;

        $query = $this->getConnection()->query(
            'SELECT id, street, number, city, zip' .
            'FROM Adress WHERE id = ' . $id);
        $query->setFetchMode(PDO :: FETCH_CLASS, Adress);
        return $query->fetch();
    }

    //Read all
    public function readAll() {
        $adress = array();
        $query = $this->getConnection()->query(
            'SELECT id, street, number, city, zip
            FROM adresses ');
        $query->setFetchMode(PDO :: FETCH_CLASS, 'adresses');
        while ($data = $query->fetch()) {
            $adress[] = $data;
        }

        return $adress;
    }

    //Update
    public function update(Adress $adress) {
        $query = $this->getConnection()->prepare(
            'UPDATE adresses SET ' .
            'street=:street,' .
            'number=:number,' .
            'city=:city,' .
            'zip=:zip ' .
            'WHERE id=:id'
        );

        $query->bindValue(':street', $adress->getStreet(), PDO::PARAM_INT);
        $query->bindValue(':number', $adress->getNumber());
        $query->bindValue(':city', $adress->getCity(), PDO::PARAM_INT);
        $query->bindValue(':zip', $adress->getZip());

        $query->execute();
    }

    //Delete
    public function delete(Adress $adress) {
        $this->getConnection()->exec(
            'DELETE FROM adresses ' .
            'WHERE id = ' . $adress->getId()
        );
    }




}
