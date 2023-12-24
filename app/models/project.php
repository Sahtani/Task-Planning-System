<?php 

class Project extends Db {
    private $Name;
    private $startDate;
    private $endDate;

    public function getName()
    {
        return $this->Name;
    }
    public function getstartDate()
    {
        return $this->startDate;
    }
    public function getendDate()
    {
        return $this->endDate;
    }
    // setters
    public function setName($Name)
    {
        $this->Name = $Name;
    }
    public function setstartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function setendDate($endDate)
    {
        $this->endDate = $endDate;
    }


    public function addproject()
    {
        $stmt = $this->connect()->prepare("INSERT INTO project (name, start_date, end_date) VALUES (:name, :start_date, :end_date)");
        $stmt->bindParam(":name", $this->getName());
        $stmt->bindParam(":start_date", $this->getstartDate());
        $stmt->bindParam(":end_date", $this->getendDate());
        $stmt->execute();
        if ($stmt->execute()) {
            return true;
        }
    }
}