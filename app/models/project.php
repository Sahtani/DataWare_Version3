 <?php
    class project extends  Db
    {
        public $name;
        public $start_date;
        public $end_date;

        public function addproject($projects)
        {
            $stmt = $this->connect()->prepare("INSERT INTO project (name, start_date, end_date) VALUES (:name, :start_date, :end_date)");
            $stmt->bindParam(":name", $projects["name"]);
            $stmt->bindParam(":start_date", $projects["s_date"]);
            $stmt->bindParam(":end_date", $projects["e_date"]);
            $stmt->execute();
            if($stmt->execute()){
                return true;
            }
        }
        public function getproject($id)
        {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM project WHERE idproject =$id");
                if ($stmt->execute()) {
                    return $stmt->fetch();
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public function updateproject($projects)
        {
            try {
                $stmt = $this->connect()->prepare("UPDATE project SET idproject =:id,name = :name, start_date = :start_date, end_date = :end_date WHERE idproject =:id");
                $stmt->bindParam("name", $projects["name"]);
                $stmt->bindParam("start_date", $projects["s_date"]);
                $stmt->bindParam("end_date", $projects["e_date"]);
                $stmt->bindParam("id", $projects["id"]);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public function deleteproject($id)
        {
            try {
                $stmt = $this->connect()->prepare("DELETE FROM project WHERE idproject =:id");
                $stmt->bindParam(":id", $id );
                $stmt->execute();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
