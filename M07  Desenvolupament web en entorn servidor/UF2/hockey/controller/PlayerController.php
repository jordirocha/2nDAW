<?php
require_once "view/PlayerView.php";
require_once "model/Player.php";
require_once "model/persist/PlayerDAO.php";

class  PlayerController
{
    private $model;
    private $view;
    private $modelUser;

    public function __construct()
    {
        $this->view = new PlayerView();
        $this->model = new PlayerDAO();
        $this->modelUser = new UserDAO();
    }

    public function processRequest()
    {
        $request = "";
        $_SESSION["info"] = "";
        $_SESSION['errors'] = "";

        if (isset($_POST["action"])) {
            $request = $_POST["action"];
        } else if (isset($_GET["option"])) {
            $request = $_GET["option"];
        }

        switch ($request) {
            case "myProfile":
                $this->displayMyProfile();
                break;
            case "listPlayers":
                $this->listPlayers();
                break;
            case "listAll":
                $this->listFullInfo();
                break;
            case "displayForm":
                $this->displayForm();
                break;
            case "add":
                $this->addPlayer();
                break;
            default:
                $this->view->display();
        }
    }
    /**
     * Lists to user all information of hockey players
     *
     * @return void
     */
    public function listPlayers()
    {
        $data = $this->model->listAll();
        if (!empty($data) && !is_null($data)) {
            $this->view->display("view/form/players.php", $data);
        } else {
            $_SESSION["errors"] = "Data players cannot be displayed at the moment";
            $this->view->display();
        }
    }
    /**
     * Displays form to user to add a new player/user 
     *
     * @return void
     */
    public function displayForm()
    {
        $this->view->display("view/form/registerPlayer.php");
    }
    /**
     * Adds on data source the new player and creates user to log in
     *
     * @return void
     */
    public function addPlayer()
    {
        $errors = "";

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "passwd", FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_input(INPUT_POST, "dni", FILTER_SANITIZE_SPECIAL_CHARS);

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $birthdate = filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_SPECIAL_CHARS);
        $is_tech = isset($_POST["is_tech"]) ? 1 : 0;
        $weight = filter_input(INPUT_POST, "weight", FILTER_SANITIZE_SPECIAL_CHARS);
        $height = filter_input(INPUT_POST, "height", FILTER_SANITIZE_SPECIAL_CHARS);
        $position = filter_input(INPUT_POST, "position", FILTER_SANITIZE_SPECIAL_CHARS);

        echo $birthdate;
        echo $weight;
        echo $height;

        $errors .= (filter_var($email, FILTER_VALIDATE_EMAIL)) ? null : "Value must be a valid email address<br>";
        $errors .= (empty($password)) ?  "Password must not be empty<br>" : null;
        $errors .= (empty($dni)) ? "DNI must not be empty<br>" : null;
        $errors .= (empty($name)) ? "Name must not be empty<br>" : null;

        if ($is_tech == 0) {
            $errors .= (empty($email) || empty($address)
                || empty($birthdate) || empty($weight) || empty($height)) ? "Values must not be empty<br>" : null;
            $errors .= (!is_numeric($weight) || !is_numeric($height)) ? "Values must be a number" : null;
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
        } else {
            $user = new User($email, $password, (($is_tech == 0) ? "jugadora" : "equiptecnic"), $address, $dni);
            if ($this->modelUser->addUser($user)) {
                $player = new Player("foto-12.jpg", $name, $address, ((empty($birthdate) ? null : $birthdate)), $is_tech, $weight, $height, $position, $dni);
                ($this->model->addPlayer($player)) ?  $_SESSION["info"] = "Data inserted successfully" :  $_SESSION["errors"] = "Error inserting data";
            } else {
                $_SESSION["errors"] = "Error inserting data";
            }
        }
        $this->view->display("view/form/registerPlayer.php");
    }
    /**
     * Displays information of the current user logged in
     *
     * @return void
     */
    public function displayMyProfile()
    {
        $data = $this->model->getMyData();
        if (!empty($data) && !is_null($data)) {
            $this->view->display("view/form/myProfile.php", $data);
        } else {
            $_SESSION["errors"] = "Your data cannot be displayed at the moment";
            $this->view->display();
        }
    }
    /**
     * Displays complete information of hockey players 
     *
     * @return void
     */
    public function listFullInfo()
    {
        $data = $this->model->listAll();
        if (!empty($data) && !is_null($data)) {
            $this->view->display("view/form/fullPlayers.php", $data);
        } else {
            $_SESSION["errors"] = "Data of roster cannot be displayed at the moment";
            $this->view->display();
        }
    }
}
