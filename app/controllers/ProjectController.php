<?php


class ProjectController extends Controller
{
    // project
    public function loadproject($error = "")
    {
        $this->view("Productowner/addproject", "", ["error" => $error]);
        $this->view->render();
    }
    public function Add_project()
    {



        if (isset($_POST["submit"])) {

            $name = $_POST["nameprojet"];
            $startdate = $_POST["startdate"];
            $enddate = $_POST["enddate"];

            $projects = array(
                "name" => $this->$name,
                "s_date" => $this->$startdate,
                "e_date" =>  $this->$enddate,
            );
            $this->model("project");
            $addproject = $this->model->addproject($projects);

            if ($addproject) {
                $this->loadproject("Project Added Successfully!");
                exit;
            } else $this->loadproject("ERROR!");
            // $this->model->addproject($projects);
        }
    }
}
