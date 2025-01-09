<?php

  /*
   * Classe User pour gérer les différents utilisateurs   
   */

namespace Models;

class User{

  private static int $id;
  private static string $email;
  private static string $passwd;
  private static string $name;
  private static string $address;
  private static int $phone_num;
  private static string $created_date;

  /*
   * Accesseurs et mutateurs des attributs de la classe  
   */
  public static function getId(): int{
    return self::$id;
  }

  public static function setId(int $id): void{
    self::$id = $id;
  }

   public static function getEmail(): string{
    return self::$email;
  }

  public static function setEmail(string $email): void{
    self::$email = $email;
  }

  public static function getPasswd(): string{
    return self::$passwd;
  }
  
  public static function setPasswd(string $passwd): void{
    self::$passwd = $passwd;
  }
  
  public static function getName(): string{
    return self::$name;
  }
  
  public static function setName(string $name): void{
    self::$name = $name;
  }
  
  public static function getAddress(): string{
      return self::$address;
    }
    
    public static function setAddress(string $address): void{
        self::$address = $address;
    }
    
    public static function getPhone_num(): int{
        return self::$phone_num;
    }
    
    public static function setPhone_num(int $phone_num): void{
        self::$phone_num = $phone_num;
    }
    
    public static function getCreatedDate(): \Datetime{
      $date = new \Datetime(self::$created_date);
      return $date;
    }
    
    public static function setCreatedDate(string $created_date): void{
      self::$created_date = $created_date;
    }


    public static function setAllParams($params){
    [
      "ID" => $id,  
      "email" => $email,
      "passwd" => $passwd,
      "name" => $name,
      "address" => $address,
      "phone_num" => $phone_num,
      "Created_date" => $created_date,
    ] = get_object_vars($params);
    self::setId($id);
    self::setEmail($email) ;
    self::setPasswd($passwd);
    self::setName($name);
    self::setAddress($address);
    self::setPhone_num($phone_num);
    self::setCreatedDate($created_date);
  }

  public static function add(string $email, string $passwd, string $name, string $address, int $phone_num){

    try{
      $bdd = BDD::connect(); // Obtenir la connexion
      $req = $bdd->prepare("INSERT INTO users( email, passwd, name, address, phone_num) VALUES(:email, :passwd, :name, :address, :phone_num)");
      $req->bindValue(":email", $email, \PDO::PARAM_STR);
      $req->bindValue(":passwd", $passwd, \PDO::PARAM_STR);
      $req->bindValue(":name", $name, \PDO::PARAM_STR);
      $req->bindValue(":address", $address, \PDO::PARAM_STR);
      $req->bindValue(":phone_num", $phone_num, \PDO::PARAM_INT);

      if(!$req->execute()){
        Utils::launchException("Une erreur s'est produite lors de l'ajout d'un utilisateur.");
      } else{
        return true ;
      }

    }catch(\Exception $e){
      Utils::readException($e);
    }

  }

  public static function getAllUsers(){
    try{
        $bdd = BDD::connect(); // Obtenir la connexion
        $req = $bdd->prepare("SELECT * FROM users ORDER BY id ASC");

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la récupération de la liste");
        }

        $users = $req->fetchAll(\PDO::FETCH_OBJ);
        $req->closeCursor();
        
        if(!$users){
            Utils::launchException("Aucun utilisateur n'a été trouvé");
        }

        return $users;

    }catch(\Exeption $e){
        Utils::readException($e);
    }
  }
  
  public static function getByEmail(string $email){
    try{
        $bdd = BDD::connect(); // Obtenir la connexion
        $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindValue(":email", $email, \PDO::PARAM_STR);

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la récupération de l'utilisateur");
        }

        $user = $req->fetch(\PDO::FETCH_OBJ);

        if(!$user){
            Utils::launchException("L'utilisateur ciblé n'a pas été trouvé");
        }

        self::setAllParams($user);

        return $user;

    }catch(\Exception $e){
        Utils::readException($e);
    }
  }

  public static function getById(int $id){
    try{
      $bdd = BDD::connect(); // Obtenir la connexion
      $req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
      $req->bindValue(":id", $id, \PDO::PARAM_INT);

        if(!$req->execute()){
            Utils::launchException("Une erreur s'est produite lors de la récupération de l'user");
        }

        $user = $req->fetch(\PDO::FETCH_OBJ);

        if(!$user){
            Utils::launchException("le user ciblé n'a pas été trouvé");
        }

        self::setAllParams($user);

        return $user;

    }catch(\Exception $e){
        Utils::readException($e);
    }
  }

  // Mettre à jour un user
  public static function update(int $id, string $email, string $passwd, string $name, string $address, int $phone_num) {
    try {
      $bdd = BDD::connect(); // Obtenir la connexion
      $req = $bdd->prepare("UPDATE users SET email=:email, passwd=:passwd, name=:name, address=:address, phone_num=:phone_num WHERE id=:id");
      $req->bindValue(":id", $id, \PDO::PARAM_INT);
      $req->bindValue(":email", $email, \PDO::PARAM_STR);
      $req->bindValue(":passwd", $passwd, \PDO::PARAM_STR);
      $req->bindValue(":name", $name, \PDO::PARAM_STR);
      $req->bindValue(":address", $address, \PDO::PARAM_STR);
      $req->bindValue(":phone_num", $phone_num, \PDO::PARAM_INT);

      if (!$req->execute()) {
          Utils::launchException("Une erreur s'est produite lors de la mise à jour de l'utilisateur "); 
      }else{
        return true ;
      }
    } catch (\Exception $e) {
        Utils::readException($e);
    }

  }

  public static function deleteAll(){
    $bdd = BDD::connect(); // Obtenir la connexion
    return $bdd->exec("DELETE FROM users"); // Supprime toutes les données de la table users 
  }

  public static function deleteUser(int $id){
    $bdd = BDD::connect(); // Obtenir la connexion
    return $bdd->exec("DELETE FROM users WHERE id=$id AND email=$email"); // Supprime un utilisateur de la table users 
  }

}