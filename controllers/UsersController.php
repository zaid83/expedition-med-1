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

    public function signin(){
        if(isset($_POST['envoi'])){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
    
            
            $newclient = $this->user->RegisterClient($email, $mdp);
            }
            
            $page = "views/Signin.phtml";
            require_once "views/Layout.phtml";

    }
}
