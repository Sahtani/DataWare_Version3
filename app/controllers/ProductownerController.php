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
}
