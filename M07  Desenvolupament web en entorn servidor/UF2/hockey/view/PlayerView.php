<?php
class PlayerView
{
    public function display($template = null, $content = null)
    {
        include("view/menu/Menu.php");
        (!empty($template)) ? include($template) : null;
        include ("view/form/messageForm.php");
    }
}
