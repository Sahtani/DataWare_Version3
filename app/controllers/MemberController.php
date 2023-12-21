
<?php
class MemberController extends Controller
{
    // project
    public function index($error = "")
    {
        // echo "test";
        $this->projectliste();
    }
    public function projectliste($error = "")
    {
        $iduser=$_SESSION['data']['iduser'];
        $this->view("user/projectliste", "", ["project" => $this->displayproject($iduser)]);
        $this->view->render();
    }
    public function displayproject($iduser)
    {
        $this->model("user");
        $project = $this->model->getprojects($iduser);
        return $project;
    }
    public function loadteam($error = "")
    {
        $this->teamliste();
    }
    public function teamliste($error = "")
    {
        $iduser = $_SESSION['data']['iduser'];
        $this->view("user/teamliste", "", ["team" => $this->displayteam($iduser)]);
        $this->view->render();
    }
    public function displayteam($iduser)
    {
        $this->model("user");
        $team = $this->model->getteams($iduser);
        if ($team === false) {
            return false;
        }
        return $team;

      
}
}