<?php

use Models\Autoloader;
ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";

Autoloader::register();

use Models\BDD;
use Models\User;
use Models\Router;
use Controllers\ErrorsController;
use Controllers\MainController;

$uri = $_SERVER["REQUEST_URI"];
 
$router = new Router();

$router->get("/", MainController::index());

// echo "YOUPI !!!!!!";

// if (isset($_GET['p'])) {
//     $p = $_GET['p'];

//     if ($p === "inscription") {
//         require_once ROOT."/views/home.php";
//         require_once ROOT."/templates/GlobalHome.php";
//     }
// } else {
//     echo "Echec !";
// }

// BDD::connect();
// $user = new User();

// $user_test = [
//     "id" => 1,
//     "email" => "test@test.com",
//     "passwd" => "test",
//     "name" => "test modifié",
//     "address" => "test",
//     "phone_num" => 845812547
// ];


// if ($user->add($user_test["email"], $user_test["passwd"], $user_test["name"],$user_test["address"], $user_test["phone_num"])) {
//     echo "User created !";
// } else {
//     echo "Failed to create the User !";
// }
