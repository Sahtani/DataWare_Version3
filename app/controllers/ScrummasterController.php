<?php
class ScrummasterController extends Controller
{
    // project
    public function index($error = "")
    {
        $this->project();
    }
    public function project($error = "")
    {
        $this->view("Scrummaster/project", "", ["project" => $this->displayproject()]);
        $this->view->render();
    }
    public function displayproject()
    {
        $this->model("scrummaster");
        $project = $this->model->getprojects();
        return $project;
    }
    // team

    public function loadteam($error = "")
    {
        $this->team();
    }
    public function team($error = "")
    {
        $this->view("Scrummaster/team", "", ["team" => $this->displayteam()]);
        $this->view->render();
    }
    public function displayteam()
    {
        $this->model("scrummaster");
        $team = $this->model->getteams();
        return $team;
    }
    // member
    public function loadmember($error = "")
    {
        $this->member();
    }
    public function member($error = "")
    {
        $this->view("Scrummaster/member", "", ["member" => $this->displaymember()]);
        $this->view->render();
    }
    public function displaymember()
    {
        $this->model("scrummaster");
        $member = $this->model->getmembers();
        return $member;
    }
    public function AddToTeam($iduser)
    {
        $team = $this->displayteam();
        $this->view("Scrummaster/Addtoteam", "", ["error" => "", "iduser" => $iduser, "team" => $team]);
        $this->view->render();
    }
    public function add_toteam()
    {
        if (isset($_POST['team'])) {
            $iduser = $_POST["id"];
            $newTeam = $_POST['team'];
            $this->model("Scrummaster");
            $member = $this->model->addtoteam($newTeam, $iduser);

            if ($member) {
                redirect("Scrummaster/member");
            } else {
                $this->AddToTeam("Failed to add member.");
            }
        }
    }
    public function Removemember($iduser)
    {
        $this->model("Scrummaster");
        $member = $this->model->Removemember($iduser);
        if ($member) {
            redirect("Scrummaster/member");
        } else {
            $this->AddToTeam("Failed to remove member.");
        }
    }
    // assign project to team
    public function assignproject($idproject){
        $team = $this->displayteam();
        $this->view("Scrummaster/assignproject", "", ["error" => "", "idproject" => $idproject, "team" => $team]);
        $this->view->render();
    }
    public function Assign_project(){
        if(isset($_POST['team'])){
            $idproject
            = $_POST["id"];
            $newTeam = $_POST['team'];
        }
        if (isset($_POST['team'])) {
            $iduser = $_POST["id"];
            $newTeam = $_POST['team'];
            $this->model("Scrummaster");
            $member = $this->model->Assignproject($idproject, $newTeam);

            if ($member) {
                redirect("Scrummaster/project");
            } else {
                $this->AddToTeam("Failed to assign project.");
            }
        }
    }
}
