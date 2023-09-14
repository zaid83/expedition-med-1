<?php

namespace controllers;

use models\DataRepository;
use models\UsersRepository;

class UsersController
{
    private $user;
    private $data;

    public function __construct()
    {
        $this->user = new UsersRepository();
        $this->data = new DataRepository();
    }
    public function index()
    {
        $pageTitle = "Expedition Med";
        $page = "views/Index.phtml";
        require_once "views/Layout.phtml";
    }
    public function login()
    {
        $pageTitle = "Connexion";
        $page = "views/Login.phtml";
        require_once "views/Layout.phtml";
    }

    public function register()
    {
        $pageTitle = "Inscription";
        $page = "views/Register.phtml";
        require_once "views/Layout.phtml";
    }
    public function registerPost()
    {
        $erreur = '';

        if (isset($_POST["password"]) && isset($_POST["email"])) {

            //check valid data

            function valid_donnees($donnees)
            {
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }

            $email = valid_donnees($_POST["email"]);
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);


            // when click on submit
            if (isset($_POST["submit"])) {

                // VERIFICATIONS
                $res = $this->user->check('email', $email);




                if ($res) {
                    $erreur = "Mail dejà existant";
                } else if (empty($email) || empty($password) || empty($password2)) {
                    $erreur = 'Un des champs est vide';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erreur = "Ceci n'est pas une adresse email valide";
                } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                    $erreur = "Ce password doit avoir au moins une majuscule, une minuscule, un nombre, un caratère speciale et dépasser 8 caractères";
                } else if ($password != $password2) {
                    $erreur = "Les mots de passe ne matchent pas";
                }


                // INSERT TO DB
                else {


                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->user->addUser($email, $password);

                    header("Location: /expedition-med/users/login");
                }
            }
            $pageTitle = "Inscription";
            $page = "views/Register.phtml";
            require_once "views/Layout.phtml";
        }
    }

    public function loginPost()
    {
        $result = $this->user->find($_POST["email"]);
        $message = $this->user->checkPassword($_POST["password"], $result);
        if ($message) {
            header("Location: /expedition-med/data/sampling");
        } else {
            $erreur = "Mauvais mot de passe";
            $page = "views/Login.phtml";
            require_once "views/Layout.phtml";
        }
    }
    public function logout()
    {
        session_destroy();
        return header('Location: /expedition-med/Users/index');
    }
}
