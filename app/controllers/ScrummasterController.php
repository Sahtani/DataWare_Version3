<?php
class ScrummasterController extends Controller
{
    // project
    public function index($error = "")
    {
        // echo "test";
        $this->project();
    }
    public function project($error="")
    {
        // die("test");
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
    public function loadmember($error=""){
       $this->member();
    }
    public function member($error = ""){
        $this->view("Scrummaster/member", "", ["member" => $this->displaymember()]);
        $this->view->render();
    }
    public function displaymember(){
        $this->model("scrummaster");
        $member = $this->model->getmembers();
        return $member;
    }}
    ?>