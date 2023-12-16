 <?php
    class project extends  Db
    {
        public function addproject($projects)
        {
            $this->connect();
            if (isset($_POST['submit'])) {
                
                $stmt=$this->connect()->prepare("INSERT INTO project(name,start_date,end_date) values(:name,:start_date,:end_date");
                $stmt->bindParam("name", $projects["name"]);
                $stmt->bindParam("start_date", $projects["s_date"]);
                $stmt->bindParam("end_date", $projects["e_date"]);
               return $stmt->execute();
            }
        }
    }
