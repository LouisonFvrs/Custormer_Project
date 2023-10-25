<?php
namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use models\ClientsModele;
use utils\Template;
class FicheController extends WebController
{
    private ClientsModele $clientsModele;

    function __construct(){
        $this->clientsModele = new ClientsModele();
    }

    // Afficher la liste d'un client
    public function fiche($id=1): string
    {

        // Récupération des données d'un client par son id
        $client = $this->clientsModele->getByClientId($id);

        return Template::render("views/fiche/client.php", ["client" => $client]);
    }
}