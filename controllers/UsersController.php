<?php

namespace Controllers;
use \Models\User;

class UsersController{

    // private static $globalTemplatePath = ROOT."/templates/Global.php";

    public static function getAllUsers(){
        $usersList = User::getAllUsers();

        // require_once ROOT."/views/Users_list.php";
        // require_once self::$globalTemplatePath;     affiche sur la page du dashboard 

    }

    // public static function getById(int $id){
    //     $User = User::getById($id);

    //     // require_once ROOT."/views/show_User.php";
    //     // require_once self::$globalTemplatePath ;
    // }

    // public static function add(){

    //     $User = User::getById($id);        

    //     // require_once ROOT."/views/update_User.php";
    //     // require_once self::$globalTemplatePath ;
    // }

    public static function new(){
        // require_once ROOT."/views/add_User.php";
        // require_once self::$globalTemplatePath ;
    }

    public static function update(int $id){

        $User = User::getById($id);        

        // require_once ROOT."/views/update_User.php";
        // require_once self::$globalTemplatePath ;
    }

    public static function addUser(){
      
        $email = isset($_POST["email"]) && !empty($_POST["email"]) ?  $_POST["email"] : null;      
        $passwd= isset($_POST["passwd"]) && !empty($_POST["passwd"]) ?  $_POST["passwd"] : null;      
        $name = isset($_POST["name"]) && !empty($_POST["name"]) ?  $_POST["name"] : null; 
        $address = isset($_POST["address"]) && !empty($_POST["address"]) ?  $_POST["address"] : null;
        $phone_num = isset($_POST["phone_num"]) && !empty($_POST["phone_num"]) ? $_POST["phone_num"] : null;
        

        if( is_null($email) || is_null($passwd) || is_null($name) ||  is_null($address) ||  is_null($phone_num) ){
            ErrorsController::launchError(404);
            exit;
        }

        User::add(
            email: $email,
            name: $name,
            passwd: $passwd,
            address: $address,
            phone_num: $phone_num,
        );

        // header("Location:/Users"); redirige sur la page de session
        exit;

        // require_once ROOT."/views/add_User.php";
        // require_once self::$globalTemplatePath ;  //affichage du formulaire de connexion 
    }


    public static function updateUser(){

        $id = isset($_POST["id"]) && !empty($_POST["id"]) ? (int) $_POST["id"] : null;      
        $email = isset($_POST["email"]) && !empty($_POST["email"]) ?  $_POST["email"] : null;      
        $passwd= isset($_POST["passwd"]) && !empty($_POST["passwd"]) ?  $_POST["passwd"] : null;      
        $name = isset($_POST["name"]) && !empty($_POST["name"]) ?  $_POST["name"] : null; 
        $address = isset($_POST["address"]) && !empty($_POST["address"]) ?  $_POST["address"] : null;
        $phone_num = isset($_POST["phone_num"]) && !empty($_POST["phone_num"]) ? $_POST["phone_num"] : null;
        $created_date = isset($_POST["created_date"]) && !empty($_POST["created_date"]) ? $_POST["created_date"] : null;  
        
        // var_dump($_POST);

        if(is_null($id) || is_null($email) || is_null($passwd) || is_null($name) || is_null($address) ||  is_null($phone_num)){
            ErrorsController::launchError(404);
            exit;
        }

        User::update(
            id: $id,
            email: $email,
            name: $name,
            passwd: $passwd,
            address: $address,
            phone_num: $phone_num,
        );

        // header("Location:/Users"); redirige sur la page de session
        exit;

        // require_once ROOT."/views/update_User.php";
        // require_once self::$globalTemplatePath ;    affichage du form de mise à jour 
    }

    public static function deleteUser(){
        $id = isset($_POST["ID"]) && !empty($_POST["ID"]) ? (int) $_POST["ID"] : null;

        if(is_null($id)){
            ErrorsController::launchError(404);
            exit;
        }

        User::deleteUser($id);

        // header("Location:/Users");  redirige sur le dashboard Admin
        exit;
    }
}

?>