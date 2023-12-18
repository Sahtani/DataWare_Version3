<?php
class User extends Persone
{

    public $iduser;

    public function getprojects($iduser)
    {
        $stmt = $this->connexion->prepare("SELECT project.idproject,project.name,project.start_date,project.end_date FROM project INNER JOIN team ON project.idteam = team.idteam  INNER JOIN users ON team.idteam=users.idteam WHERE users.iduser =$iduser AND users.rol = 3");
        $stmt->execute();
        $stmt->fetchAll();
        $data = $stmt->rowCount();
        if ($data > 0) {
            return $data;
        }
    }
    public function getteams($iduser)
    {
        $stmt = $this->connexion->prepare("SELECT team.idteam,team.name,team.datecreation FROM team
            INNER JOIN users ON users.idteam = team.idteam WHERE users.iduser =$iduser AND users.rol = 3");
        $stmt->execute();
        $stmt->fetchAll();
        $data = $stmt->rowCount();
        if ($data > 0) {
            return $data;
        }
    }
}
