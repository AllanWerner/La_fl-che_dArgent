<?php

namespace Models;
use PDO;
use Exception;

class BDD{

    private static $bdd;

    public static function connect() {
      if (self::$bdd === null) {
        $database = parse_ini_file(ROOT."/config/bdd.ini");
        $host = $database["host"];
        $dbname = $database["dbname"];
        $username = $database["username"];
        $password = $database["password"];
  
        try {
          self::$bdd = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $username,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
          );
        } catch (Exception $e) {
          die("Erreur : " . $e->getMessage());
        }
      }
      return self::$bdd;
    }

}