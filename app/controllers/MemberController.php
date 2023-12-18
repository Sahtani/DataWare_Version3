
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
        $iduser=$_SESSION['data']['rol'];
        $this->view("user/projectliste", "", ["project" => $this->displayproject($iduser)]);
        $this->view->render();
    }
    public function displayproject($iduser)
    {
        $this->model("user");
        $project = $this->model->getprojects($iduser);
        return $project;
    }
}
