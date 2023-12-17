<?php
class ProductownerController extends Controller
{
    // project
    public function index($error = "")
    {
        $this->view("Productowner/project", "", ["error" => $error]);
        $this->view->render();
    }
    public function project()
    {
        $this->view("Productowner/project", "", ["project" => $this->displayproject()]);
        $this->view->render();
    }
    public function displayproject()
    {
        $this->model("productowner");
        $project = $this->model->getprojects();
        return $project;
    }
    // team
    
    public function loadteam($error = "")
    {
        $this->view("Productowner/team", "", ["error" => $error]);
        $this->view->render();
    }
    public function team()
    {
        $this->view("Productowner/team", "", ["team" => $this->displayteam()]);
        $this->view->render();
    }
    public function displayteam()
    {
        $this->model("productowner");
        $team = $this->model->getteams();
        return $team;
    }
    // member
    public function loadmember($error=""){
        $this->view("Productowner/member", "", ["error" => $error]);
        $this->view->render();
    }
    public function member(){
        $this->view("Productowner/member", "", ["member" => $this->displaymember()]);
        $this->view->render();
    }
    public function displaymember(){
        $this->model("productowner");
        $member = $this->model->getmembers();
        return $member;
    }
    // updaterol member
    public function loadupdaterol($error){
        $this->view("Productowner/updaterol", "", ["error" => $error]);
        $this->view->render();
    }
    public function updaterol($updaterol){
        $this->model("productowner");
        $member_rol=$this->model->updaterol($updaterol);
        if ($member_rol) {
           $this->loadupdaterol("");
        } else {
            $this->loadupdaterol("Failed to update rol.");
        }

    }

    public function loadAssignProject($id, $error = "")
    {
        $project = $this->displayProject($id);
        $this->view("Productowner/assignproject", "", ["error" => $error, "project" => $project]);
        $this->view->render();
    }

    public function assign_Project($newProject, $idUser)
    {
        $this->model("productowner");
        $assignProject = $this->model->assignProject($newProject, $idUser);
        if ($assignProject) {
            $this->loadAssignProject($idUser,"Project assigned successfully!");
        } else {
            $this->loadAssignProject($idUser, "Failed to assign project.");
        }
    }
}
