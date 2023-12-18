<?php
class TeamController extends Controller
{

    public function loadteam($error = "")
    {
        $this->view("Scrummaster/addteam", "", ["error" => $error]);
        $this->view->render();
    }
    public function Add_team()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $datecreation = $_POST["datecreation"];
            $teams = array(
                "name" => $this->validateData($name),
                "datecreation" => $this->validateData($datecreation),

            );
            $this->model("team");
            $addteam = $this->model->addteam($teams);

            if ($addteam) {
                $this->loadteam("Team Added Successfully!");
            } else {
                $this->loadteam("error");
            }
        }
    }

    public function updateteam($id, $error = "")
    {
        $team = $this->displayteam($id);
        $this->view("Scrummaster/updateteam", "", ["error" => $error, "team" => $team]);
        $this->view->render();
    }
    public function displayteam($id)
    {
        $this->model("team");
        $team = $this->model->getteam($id);
        return $team;
    }
    public function update_team()
    { 
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $datecreation = $_POST["datecreation"];
            $id = $_POST["id"];


            $teams = array(
                "name" => $this->validateData($name),
                "datecreation" => $this->validateData($datecreation),
                "idteam" => $id
            );


            $this->model("team");
            $updateteam = $this->model->updateteam($teams);
            if ($updateteam) {
             
                redirect("Scrummaster/team");
                exit;
            } else {
                $this->updateteam($id, "Failed to update team.");
            }
        }
    }
    public function delete_team($idteam){
        $this->model("team");
        $result = $this->model->deleteteam($idteam);
        redirect("Scrummaster/team");
    }


    public function validateData($data)
    {
        if (isset($data) and !empty($data)) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
}
