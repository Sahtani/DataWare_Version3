<?php
class Productowner extends Persone
{
    public function getprojects()
    {
        try {
            $stmt = $this->connexion->prepare("SELECT * FROM project");
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getteams()
    {
        try {
            $stmt = $this->connexion->prepare("SELECT team.idteam,team.name AS team_name, team.datecreation, project.name FROM team LEFT JOIN project ON team.idteam = project.idteam");
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getmembers()
    {
        try {
            $stmt = $this->connexion->prepare("SELECT iduser,firstname,lastname,email,rol FROM users where rol in (0,2)");
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updaterol($updaterol)
    {
        $stmt = $this->connexion->prepare("UPDATE users set rol=2 where iduser=:updaterol");

        $stmt->bindParam(":updaterol", $updaterol);
        return $stmt->execute();
    }

    public function assignProject($newProject, $idUser)
    {
        $stmt = $this->connexion->prepare("UPDATE users SET idproject = :newProject WHERE iduser = :idUser");
        $stmt->execute([':newProject' => $newProject, ':idUser' => $idUser]);
        $affectedRows = $stmt->rowCount();
        return $affectedRows;
    }
}

    


