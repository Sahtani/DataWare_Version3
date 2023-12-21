   <?php
    class Scrummaster extends Persone
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
                $stmt = $this->connexion->prepare("SELECT * FROM users where rol in (0,3)");
                $stmt->execute();
                $data = $stmt->fetchAll();
                if (count($data) > 0) {
                    return $data;
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public function addtoteam($newTeam, $iduser)
        {
            $stmt = $this->connexion->prepare("UPDATE users SET idteam = :newTeam ,rol=3 WHERE iduser = :iduser");
            $stmt->bindParam(":newTeam", $newTeam);
            $stmt->bindParam(":iduser", $iduser);
            if ($stmt->execute()) {
                return true;
            }
        }
        public function Removemember($iduser)
        {
            $stmt = $this->connexion->prepare("UPDATE users SET idteam =null WHERE iduser = :iduser");
            $stmt->bindParam(':iduser', $iduser);
            if ($stmt->execute()) {
                return true;
            }
        }
        public function Assignproject($idproject, $newTeam)
        {
            $stmt = $this->connexion->prepare("UPDATE project SET idteam = :newTeam WHERE idproject = :projectid");
            $stmt->bindParam(":newTeam", $newTeam);
            $stmt->bindParam(":projectid", $idproject);
            if ($stmt->execute()) {
                return true;
            }
        }
    }
