<?php
require_once "view/UserView.php";
require_once "model/User.php";
require_once "model/persist/UserDAO.php";

class UserController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserDAO();
    }
    public function processRequest()
    {
        $request = "";
        $_SESSION["errors"] = "";

        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) {
            $request = $_GET["option"];
        }

        switch ($request) {
            case "formLogin":
                $this->formLogin();
                break;
            case "login":
                $this->login();
                break;
            case "logout":
                session_destroy();
                setcookie("role", "", time() - 3600);
                header("Location: index.php");
                break;
            default:
                $this->view->display();
        }
    }
    /**
     * Displays form to user to log in
     *
     * @return void
     */
    public  function formLogin()
    {
        $this->view->display("view/form/login.php");
    }
    /**
     * Allow log in to user and checks if the user and passwords exists in data source
     *
     * @return void
     */
    public  function login()
    {
        $email = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $user = $this->model->checkLogin($email, $password);
        
        if (!is_null($user)) {
            $_SESSION["dni"] = $user->getDni();
            $_SESSION["logged"] = true;
            setcookie("role", $user->getRole());
        }

        (isset($_SESSION["logged"])) ?  header("Location: index.php") : $_SESSION["errors"] .= "Email or password introduced are wrong";

        $this->formLogin();
    }
}
