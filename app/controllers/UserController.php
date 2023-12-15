<?php
class UserController extends Controller
{
    public function index($error = "")
    {
        $this->view("home/signup", "", ["error" => $error]);
        $this->view->render();
    }
    public function log_in($error = "")
    {
        $this->view("home/login", "", ["error" => $error]);
        $this->view->render();
    }

    public function Usersignup()
    {

        if (isset($_POST["submit"])) {

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $data = array(
                "f_name" => $this->validateData($firstname, 'name'),
                "l_name" => $this->validateData($lastname, 'name'),
                "email" => filter_var($this->validateData($email, 'email'), FILTER_SANITIZE_EMAIL),
                "password" => password_hash($this->validateData($password, 'password'), PASSWORD_DEFAULT),
            );

            $this->model("persone");

            $existed_Persone = $this->model->validatePersone($data["email"]);
            // 
            //    die("test");
            if ($existed_Persone) {


                $this->index("This Email Already Exist!");
                exit;
            }

            // Sign up the user
            $this->model->Signup($data);

            // Redirect to a home page or another appropriate location
            // redirect("home/home");

        }
    }
    public function validateData($data, $dataType)
    {
        // regex 
        switch ($dataType) {
            case 'name':
                $pattern = '/^[A-Za-z ]{3,}$/';
                break;
            case 'email':
                $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                break;
            case 'password':
                $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
                break;
            default:
                break;
        }
        // die($pattern);
        // Validate and sanitize the data
        if (isset($data) && !empty($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            if (preg_match($pattern, $data))
                return $data;
        }

        return false;
    }
    public function Userlogin()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $data = array(
                "email" => filter_var($this->validateData($email, 'email'), FILTER_SANITIZE_EMAIL),
                "password" => $this->validateData($password, 'password'),
            );

            $this->model("persone");
            $user = $this->model->logIn($data);
            if ($user !== null && $data["email"] === $user["email"] && password_Verify($data["password"], $user["password"])) {
                $_SESSION['data'] = $data;
                $_SESSION['authorize'] = true;
            } else {
                $this->log_in("this account does not exist.");
                exit;
            }
            // if (isset($_SESSION['data'][0]['rol']) && $_SESSION['data'][0]['rol'] == 1) {
            //     header('location:./ProductOwner/projet.php');
            // } else if (isset($_SESSION['data'][0]['rol']) && $_SESSION['data'][0]['rol'] == 2) {
            //     header('location:./ScrumMaster/projet.php');
            // } else if (isset($_SESSION['data'][0]['rol']) && $_SESSION['data'][0]['rol'] == 3) {
            //     header('location:./Membre/projectliste.php');
            // } else {
            //     header('location:index.php');
            // }
        } else {
            header("Location: http://localhost/DataWare_Version3//public/home/");
        }
    }
}
