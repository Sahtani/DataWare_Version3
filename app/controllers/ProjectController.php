<?php


class ProjectController extends Controller
{
    // addproject
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
                "name" => $this->validateData($name),
                "s_date" => $this->validateData($startdate),
                "e_date" => $this->validateData($enddate),
            );
            $this->model("project");
            $addproject = $this->model->addproject($projects);
            if ($addproject) {
                $this->loadproject("Project Added Successfully!");
                exit;
            } else{$this->loadproject("Project Added Successfully!");};
  
        }
    }
    public function displayproject($id)
    {
        $this->model("project");
        $project = $this->model->getproject($id);
        return $project;
    }

    public function updateproject($id, $error = "")
    {
        $project = $this->displayproject($id);
        $this->view("Productowner/updateproject","" ,["error" => $error,"project" => $project]);
        $this->view->render();
    }

    public function update_project()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["nameprojet"];
            $startdate = $_POST["startdate"];
            $enddate = $_POST["enddate"];
            $id = $_POST["id"];

            $projects = array(
                "name" => $this->validateData($name),
                "s_date" => $this->validateData($startdate),
                "e_date" => $this->validateData($enddate),
                "id" => $id
            );


            $this->model("project");
            $updateProject = $this->model->updateProject($projects);

            if ($updateProject) {
                redirect("Productowner/project");
                exit;
            } else {
                $this->updateproject($id,"Failed to update project.");
            }
        }
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
