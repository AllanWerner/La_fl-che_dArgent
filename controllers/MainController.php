<?php

namespace Controllers;

class MainController{

    public static function index(){
        // require_once ROOT."/views/home.php";
        // require_once ROOT."/templates/GlobalHome.php";

        require_once ROOT."/views/home.php";
        require_once ROOT."/templates/GlobalHome.php";

    }

    public static function login(){
        // require_once ROOT."/views/home.php";
        // require_once ROOT."/templates/GlobalHome.php";

        require_once ROOT."/views/test_connexion.php";
        require_once ROOT."/templates/GlobalForm.php";


    }

}