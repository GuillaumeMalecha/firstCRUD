<?php

class Student
{
    // Attributes
    private $lastName;
    private $firstName;
    private $street;
    private $number;
    private $zip;
    private $city;

    // Method
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getFullName()
    {
        echo "Le nom de l'élève est " . $this->getFirstName() . " " . $this->getLastName() . ".";
    }

    public function getAdress()
    {
        echo "L'adresse de l'élève est " . $this->getStreet() . " n°" . $this->getNumber() . " à " . $this->getZip() . " " . $this->getCity() . ".";
    }

}

$student1 = new Student();
$student1->setFirstName("Kevin");
$student1->setLastName("MacAllister");
$student1->setStreet("Lincoln Avenue");
$student1->setNumber("671");
$student1->setZip("60093");
$student1->setCity("Winnetka");

$student1->getFullName();
echo "</br>";
$student1->getAdress();

?>