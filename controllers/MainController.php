<?php

namespace Controllers;

class MainController{

    public static function index(){
        require_once ROOT."/views/home.php";
        require_once ROOT."/templates/GlobalHome.php";
    }

}