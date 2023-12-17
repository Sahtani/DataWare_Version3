<?php
class team extends Db
{
    public $idteam;
    public $name;
    public $datecreation;

    public function addteam($teams)
    {
        $stmt = $this->connect()->prepare("INSERT  into team (name,datecreation) values(:name,:datecreation)");
        $stmt->bindParam(":name", $teams["name"]);
        $stmt->bindParam(":datecreation", $teams["datecreation"]);
        if ($stmt->execute()) {
            return true;
        }
    }
    public function getteam($id)
    {
        try {
            $stmt = $this->connect()->prepare("SELECT * from team WHERE idteam =$id");
            if ($stmt->execute()) {
                return $stmt->fetch();
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateteam($teams)
    {
        $stmt = $this->connect()->prepare("UPDATE team SET name =:name, datecreation = :datecreation WHERE idteam = :idteam");
        $stmt->bindParam(":name", $teams["name"]);
        $stmt->bindParam(":datecreation", $teams["datecreation"]);
        $stmt->bindParam(":idteam", $teams["idteam"]);
        $stmt->execute();
        if ($stmt->execute()) {
            return true;
        }
    }
}
