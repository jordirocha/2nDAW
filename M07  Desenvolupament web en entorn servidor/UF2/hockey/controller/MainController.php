<?php

require_once "controller/PlayerController.php";
require_once "controller/TeamController.php";
require_once "controller/UserController.php";
class MainController
{

    public function processRequest()
    {
        $request = isset($_GET["menu"]) ? $_GET["menu"] : null;

        switch ($request) {
            case "user":
                $user = new UserController();
                $user->processRequest();
                break;
            case "player":
                $player = new PlayerController();
                $player->processRequest();
                break;
            case "team":
                $team = new TeamController();
                $team->processRequest();
                break;
            default:
                include("view/menu/Menu.php");
        }
    }
}
