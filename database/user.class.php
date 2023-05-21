<?php
  declare(strict_types = 1);

  class User {
    public int $id;
    public string $email;
    public string $name;
    public string $username;
    public string $roles;

    public function __construct(int $id, string $email, string $name, string $name, string $roles;)
    { 
      $this->idUser = $id;
      $this->email = $email;
      $this->name = $name;
      $this->username = $username;
      $this->roles = $roles;
    }

    static function getUsers(PDO $db) : array {
      $stmt = $db->prepare('SELECT * FROM User');
      $stmt->execute();
  
      $users = array();
      while ($user = $stmt->fetch()) {
        $users[] = new User(
          intval($user['idUser']),
          htmlentities($user['email']),
          htmlentities($user['name']),
          htmlentities($user['username']),
          htmlentities($user['roles'])
        );
      }
  
      return $users;
    }

    static function getUserEmailPassword(PDO $db, string $email, string $password ){
      $stmt = $db->prepare('SELECT * FROM User WHERE lower(email) = ? ');
      $stmt->execute(array(strtolower($email)));

      if($user = $stmt->fetch()){
        if(!password_verify($password, $user['password'])){
          return null;
        }

        return new User(
          intval($user['idUser']),
          htmlentities($user['email']),
          htmlentities($user['name']),
          htmlentities($user['username']),
          htmlentities($user['roles'])
        );
      }else return null;
    }
    
    static function getUserById(PDO $db, int $id){
      $stmt = $db->prepare('SELECT * FROM User WHERE idUser = ?');
      $stmt->execute(array($id));
      

      if($user = $stmt->fetch()){
        return new User(
            intval($user['idUser']),
            htmlentities($user['email']),
            htmlentities($user['name']),
            htmlentities($user['username']),
            htmlentities($user['roles'])
        );
      }else return null;
    }
  }
?>