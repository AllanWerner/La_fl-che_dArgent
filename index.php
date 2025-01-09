<?php

use Models\Autoloader;
ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";

Autoloader::register();

use Models\BDD;
use Models\User;

echo "YOUPI !!!!!!";

if (isset($_GET['p'])) {
    $p = $_GET['p'];

    if ($p === "inscription") {
        require "./views/inscription.php";
        require "./templates/GlobalForm.php";
    }
} else {
    echo "Echec !";
}

BDD::connect();
$user = new User();

$user_test = [
    "id" => 1,
    "email" => "test@test.com",
    "passwd" => "test",
    "name" => "test modifié",
    "address" => "test",
    "phone_num" => 845812547
];


if ($user->add($user_test["email"], $user_test["passwd"], $user_test["name"],$user_test["address"], $user_test["phone_num"])) {
    echo "User created !";
} else {
    echo "Failed to create the User !";
}
