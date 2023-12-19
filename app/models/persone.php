<?php
class Persone
{
        protected int $id;
        protected string $First_name;
        protected string $Last_Name;
        protected string $email;
        protected string $password;
        protected int $rol;
        protected $data;

        public $connexion;

        function __construct()
        {
                $Dbinstance = new Db();
                $this->connexion = $Dbinstance->connect();
        }

        //registeration function
        public function Signup($data)
        {

                try {
                        $stmt = $this->connexion->prepare("INSERT INTO users (firstname,lastname,email,password) values(:firstname,:lastname,:email,:password)");
                        $stmt->bindParam("firstname", $data["f_name"]);
                        $stmt->bindParam("lastname", $data["l_name"]);
                        $stmt->bindParam("email", $data["email"]);
                        $stmt->bindParam("password", $data["password"]);
                        return  $stmt->execute();
                       
                } catch (PDOException $e) {
                        return $e->getMessage();
                }
        }
        // get Persone
        protected function getPersonne($data)
        {
                try {
                        $stmt = $this->connexion->prepare("SELECT * FROM users");
                        if ($stmt->execute()) {
                                return $this->$data=$stmt->fetchAll();
                        }
                } catch (PDOException $e) {
                        return $e->getMessage();
                }
        }
        public function validatePersone($email)
        {
                try {
                        $stmt = $this->connexion->prepare("SELECT email FROM `users` WHERE email = :email");
                        $stmt->bindParam("email",$email);
                        $stmt->execute();
                        if ($stmt->fetch()) {
                                return true;
                        } else {
                                return false;
                        }
                } catch (PDOException $e) {
                        return $e->getMessage();
                }
        }
        public function logIn($data)
        {
                try {
                        $stmt = $this->connexion->prepare("SELECT * from users where email=:email");
                        $stmt->execute(['email' => $data["email"]]);
                       return $stmt->fetch();
                      


                } catch (PDOException $e) {
                        return $e->getMessage();
                }
        }
        public function updatePersone($id){
                $stmt = $this->connexion->prepare("UPDATE users SET idproject= null  WHERE idproject=:id");
                 $stmt->bindParam(':id', $id);
                $stmt->execute();
        }
        // protected function Logout()
        // {
        // }
}
