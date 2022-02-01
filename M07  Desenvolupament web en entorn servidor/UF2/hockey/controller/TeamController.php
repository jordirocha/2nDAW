<?php
require_once "view/TeamView.php";
require_once "model/persist/TeamDAO.php";

class TeamController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new TeamView();
        $this->model = new TeamDAO();
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
            case "listClassification":
                $this->listClassification();
                break;
            case "news":
                $this->displayNews();
                break;
            default:
                $this->view->display();
        }
    }
    /**
     * Lists a table with all results of matches
     *
     * @return void
     */
    public function listClassification()
    {
        $data = $this->model->listAll();
        if (!empty($data) && !is_null($data)) {
            $this->view->display("view/form/clasification.php", $data);
        } else {
            $_SESSION["errors"] = "Table cannot be displayed at the moment";
            $this->view->display();
        }
    }
    /**
     * Displays a page with news about the team
     *
     * @return void
     */
    public function displayNews()
    {
        $this->view->display("view/form/news.php");
    }
}
