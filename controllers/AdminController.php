<?php

namespace controllers;

use models\DataRepository;
use models\UsersRepository;

class AdminController
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
        $this->user->checkConnexion($_SESSION["id"]);
        $prelevements = $this->data->findAll();
        $tri = $this->data->findAllTri();
        $pageTitle = "Expedition Med Admin";
        $page = "views/AdminIndex.phtml";
        require_once "views/Layout.phtml";
    }

    public function importExcel()
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $pageTitle = "Import Csv";
        $page = "views/AdminImport.phtml";
        require_once "views/Layout.phtml";
    }


    public function allYears()
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $prelevements = $this->data->findAll();
        header('Content-Type: application/json');
        echo json_encode($prelevements);
    }

    public function viewBySample($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $result = $this->data->findAllBySample($id);
        $page = "views/ViewBySample.phtml";
        require_once "views/Layout.phtml";
    }



    public function editBySample($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $prelevement = $this->data->findAllBySample($id);
        $pageTitle = "Edition par Sample";
        $page = "views/EditBySample.phtml";
        require_once "views/Layout.phtml";
    }
    public function editBySamplePost($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $this->data->editBySample($id, $_POST);
        return header('Location: /expedition-med/admin/index');
    }
    public function deleteBySample($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $this->data->deleteBySample($id);
        return header('Location: /expedition-med/admin/index');
    }
    public function triBySample($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $tri = $this->data->triBySample($id);
        $page = "views/TriBySample.phtml";
        require_once "views/Layout.phtml";
    }
    public function editByTri($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $tri = $this->data->findByTri($id);
        $page = "views/EditByTri.phtml";
        require_once "views/Layout.phtml";
    }
    public function editByTriPost($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $this->data->editByTri($id, $_POST);
        return header('Location: /expedition-med/admin/triBySample/' . $_POST["sample"]);
    }

    public function deleteByTri($id)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $tri = $this->data->findByTri($id);
        $this->data->deleteByTri($id);
        return header('Location: /expedition-med/admin/triBySample/' . $tri["Sample"]);
    }
    public function samplesByYear($year)
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $samples = $this->data->findSamplesByYear($year); // Appeler la méthode du repository pour récupérer les prélevements par année
        // Retourner les prélevements sous forme JSON
        header('Content-Type: application/json');
        echo json_encode($samples);
    }

    public function uniqueYears()
    {
        $this->user->checkConnexion($_SESSION["id"]);
        $years = $this->data->findUniqueYears(); // Appeler la méthode du repository pour récupérer les années uniques
        // Retourner les années sous forme JSON
        header('Content-Type: application/json');
        echo json_encode($years);
    }

    // ... (autres méthodes)
}
