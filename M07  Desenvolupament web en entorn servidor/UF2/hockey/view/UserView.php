<?php
class UserView
{
    public function display($template = null, $content = null)
    {
        
        (isset($_SESSION["logged"])) ? include("view/menu/Menu.php") : null;
        (!empty($template)) ? include($template) : null;
        // include ("view/form/messageForm.php");
    }
}
