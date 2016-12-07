<?php
namespace m2i\ecommerce\Controllers;

use m2i\ecommerce\Config\DbConnection;
use m2i\ecommerce\DAO\ClientDAO;
use m2i\ecommerce\DAO\ClientDTO;
use m2i\Framework\View;

class ClientController
{

    private $pageTitle = "Clients";

    public function indexAction(){
        $dao = new ClientDAO(DbConnection::getPDO());
        $data = $dao->findAll();

        $view = new View();

        echo $view->render('view-client-list', [
            'data' => $data, 'pageTitle' => $this->pageTitle
            ]
        );
    }

    public function deleteAction($id){
        $dao = new ClientDAO(DbConnection::getPDO());
        $client = new ClientDTO();
        $client->setId($id);
        $dao->delete($client);

        header("location:/client");
    }

    public function formAction($id=null){
        $client = new ClientDTO();
        $action = "/client/persist";
        if($id != null){
            $dao = new ClientDAO(DbConnection::getPDO());
            $data = $dao->findOneById([$id]);

            $client->setId($data['id_client']);
            $client->setNom($data['nom']);
            $client->setPrenom($data['prenom']);
            $client->setEmail($data['email']);
            $client->setDateNaissance($data['date_naissance']);

            $action .= "/$id";
        }

        $view = new View();

        echo $view->render('view-client-form', [
                'client' => $client, 'pageTitle' => $this->pageTitle,
                'action' => $action
            ]
        );
    }

    public function persistAction($id=null){
        $client = new ClientDTO();

        $client->setId($id);
        $client->setNom(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
        $client->setPrenom(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
        $client->setEmail(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $client->setDateNaissance(filter_input(INPUT_POST, 'dateNaissance', FILTER_SANITIZE_STRING));

        if($id==null){
            $password = filter_input(INPUT_POST, 'plainPassword', FILTER_SANITIZE_STRING);
            $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);

            if($password != $passwordConfirm){
                $_SESSION['error'] = "Le mot de passe et sa confirmation doivent être identiques";
                //var_dump($_SESSION);
                header("location:/client/form");
                exit;
            }

            $client->setMotDePasse(
                sha1($password)
            );
        }


        $dao = new ClientDAO(DbConnection::getPDO());
        $dao->save($client);

        header("location:/client");

    }
}