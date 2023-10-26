<?php
namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use models\ProduitsModele;
use utils\Template;

class ProduitController extends WebController
{
    private ProduitsModele $produitsModel;

    function __construct(){
        $this->produitsModel = new ProduitsModele();
    }

    // Afficher la liste d'un client
    public function fiche($search, $page = 0): string
    {

        if (!empty($search)) {
            $produits = $this->produitsModel->recherche($search, 10 ,$page);
        } else {
            $produits = $this->produitsModel->getAllProduits(10, $page);
        }

        return Template::render(
            "views/global/listeProduit.php",
            array("page" => $page, "listeProduit" => $produits)
        );

    }

    public function supprimer($id) {
        $this->produitsModel->supprimer($id);
        $this->redirect('/liste-produit');

    }
}