<?php

namespace models;

use PDO;

class UsersRepository
{

    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = \config\Database::getpdo();
    }
    public function findAll()
    {
        $select = $this->pdo->prepare("SELECT * FROM user");
        $select->execute();

        return $select->fetchAll();
    }
    public function find($email)
    {
        $select = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $select->execute(array($email));

        return $select->fetch();
    }
    public function checkPassword($password, $result)
    {
        if (password_verify($password, $result["password"])) {
            $_SESSION["id"] = $result["id"];
            var_dump($_SESSION);
            return true;
        } else {
            return false;
        }
    }
    public function checkConnexion($id)
    {
        if (!isset($id)) {
            return header("Location: /expedition-med/users/logout");
        }
    }

    /**
     * Sign up User
     * @return void
     */

    public function addUser(string $email, string $password): void
    {

        $insert = $this->pdo->prepare("
          INSERT INTO user(email, password)
          VALUES(:email, :password)");
        $insert->bindParam(':email', $email);
        $insert->bindParam(':password', $password);
        $insert->execute();
    }

    public function check($column, $params)
    {
        $compare = $this->pdo->prepare('SELECT ' . $column . ' FROM user WHERE ' . $column . ' = ?');
        $compare->execute([$params]);
        $res = $compare->fetchAll();
        return $res;
    }
}
