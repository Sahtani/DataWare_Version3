<?php
class UserController extends Controller
{
    public function index($error = "")
    {
        $this->view("home/home", "", ["error" => $error]);
        $this->view->render();
    }
    public function log_in($error = "")
    {
        $this->view("home/login", "", ["error" => $error]);
        $this->view->render();
    }
    public function sign_up($error = "")
    {
        $this->view("home/signup", "", ["error" => $error]);
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

            if ($existed_Persone) {
                $this->sign_up("This Email Already Exist!");
                exit;
            } else $this->sign_up("Sign-up successful!");

            // Sign up the user
            $this->model->Signup($data);
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
                $_SESSION['data'] = $user;
                $_SESSION['authorize'] = true;
            } else {
                $this->log_in("this account does not exist.");
                exit;
            }
            if (isset($_SESSION['data']['rol']) && $_SESSION['data']['rol'] == 1) {
                redirect("Productowner/project");
            } else  if (isset($_SESSION['data']['rol']) && $_SESSION['data']['rol'] == 2) {
                redirect("Scrummaster/project");
            } else if (isset($_SESSION['data']['rol']) && $_SESSION['data']['rol'] == 3) {
                redirect('member/projectliste');
            }
        } else {
            header("Location: http://localhost/DataWare_Version3//public/home/");
        }
    }

    // logout user
    public function logout()
    {

if (session_destroy()) {
    redirect('user/log_in');
}

}}
