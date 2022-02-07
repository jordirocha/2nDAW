<?php
class PlayerView
{
    public function display($template = null, $content = null)
    {
        (isset($_POST["action"]) && $_POST["action"] == "search" ? null : include("view/menu/Menu.php"));
        (!empty($template)) ? include($template) : null;
        include("view/form/messageForm.php");
    }
}
