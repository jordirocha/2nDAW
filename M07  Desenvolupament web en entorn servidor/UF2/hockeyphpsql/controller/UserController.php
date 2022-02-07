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
        $_SESSION["info"] = "";

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
            case "modifyMyProfile":
                (isset($_COOKIE["role"]) && $_COOKIE["role"] == "jugadora") ?  $this->modifyMyProfile() : null;
                break;
            case "modify":
                $this->update();
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

    /**
     * Displays to user their address and password to be updated
     *
     * @return void
     */
    public function modifyMyProfile()
    {
        $data = $this->model->getMyData();
        if (!empty($data) && !is_null($data)) {
            $this->view->display("view/form/modifyMyProfile.php", $data);
        } else {
            $_SESSION["errors"] = "Your data to update it cannot be displayed at the moment";
            $this->view->display();
        }
    }

    /**
     * Updates address and password from current user
     *
     * @return void
     */
    public function update()
    {
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($address) && !empty($password)) {
            ($this->model->updateMyData($address, $password)) ?  $_SESSION["info"] = "Data updated successfully" :  $_SESSION["errors"] = "Error updating data";
        } else {
            $_SESSION["errors"] = "Values cannot be blank";
        }

        $this->modifyMyProfile();
    }
}
