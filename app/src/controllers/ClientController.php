<?php
namespace m2i\ecommerce\Controllers;

use m2i\ecommerce\Config\DbConnection;
use m2i\ecommerce\DAO\ClientDAO;
use m2i\ecommerce\DAO\ClientDTO;
use m2i\Framework\View;

class ClientController
{

    private $pageTitle = "Clients";

    private $error;

    public function indexAction()
    {
        $dao = $this->getDAO();
        $data = $dao->findAll();

        $view = new View();

        echo $view->render('view-client-list', [
                'data' => $data, 'pageTitle' => $this->pageTitle
            ]
        );
    }

    public function deleteAction($id)
    {
        $dao = $this->getDAO();
        $client = $this->getDTO();
        $client->setId($id);
        $dao->delete($client);

        header("location:/client");
    }

    public function addEditAction($id = null)
    {
        $client = $this->getDTO();
        $action = "/client/add-edit";
        $error = null;

        //Récupération des données du client à modifier
        if ($id != null) {
            $this->hydrateDTO($id, $client);
            $action .= "/$id";
        }

        //Traitement des données postées
        if ($this->isPosted()) {
            if ($this->handleForm($id, $client)) {
                $this->getDAO()->save($client);
                header("location:/client");
                exit;
            } else {
                $error = $this->error;
            }
        }

        //Affichage du formulaire
        $view = new View();
        echo $view->render('view-client-form', [
                'client' => $client, 'pageTitle' => $this->pageTitle,
                'action' => $action,
                'error' => $error
            ]
        );
    }

    private function isPosted()
    {
        return filter_has_var(INPUT_POST, 'submit');
    }

    private function hydrateDTO($id, ClientDTO &$client)
    {
        $dao = $this->getDAO();
        $data = $dao->findOneById([$id]);

        $client->setId($data['id_client']);
        $client->setNom($data['nom']);
        $client->setPrenom($data['prenom']);
        $client->setEmail($data['email']);
        $client->setDateNaissance($data['date_naissance']);
    }

    private function handleForm($id, ClientDTO &$client)
    {
        $valid = true;

        $client->setId($id);
        $client->setNom(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
        $client->setPrenom(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
        $client->setEmail(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $client->setDateNaissance(filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_STRING));

        if ($id == null) {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);

            if ($password != $passwordConfirm) {
                $this->error = "Le mot de passe et sa confirmation doivent être identiques";
                $valid = false;
            }

            $client->setMotDePasse(
                sha1($password)
            );
        }

        return $valid;
    }

    /**
     * @return ClientDAO
     */
    private function getDAO():ClientDAO
    {
        $dao = new ClientDAO(DbConnection::getPDO());
        return $dao;
    }

    /**
     * @return ClientDTO
     */
    private function getDTO():ClientDTO
    {
        $client = new ClientDTO();
        return $client;
    }
}