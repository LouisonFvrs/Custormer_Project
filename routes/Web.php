<?php

namespace routes;

use controllers\ClientController;
use controllers\FicheController;
use controllers\ProduitController;
use controllers\SampleWebController;
use models\classes\Produit;
use routes\base\Route;
use utils\Template;

class Web
{
    function __construct()
    {
        $client = new ClientController();
        $fiche = new FicheController();
        $produit = new ProduitController();

        Route::Add("/", [$client, "connexion"]);

        Route::Add("/liste", [$client, 'listeClient']);
        Route::Add('/liste/{page}', [$client, 'listeClient']);

        Route::Add("/liste-produit", [$produit, 'fiche']);
        Route::Add("/liste-produit/{page}", [$produit, 'fiche']);
        Route::Add("/supprimerProduit/{id}", [$produit, 'supprimer']);

        Route::Add("/client/{id}", [$fiche, 'fiche']);
        Route::Add("/supprimerAdresse/{idClient}/{idAdresse}", [$client, 'supprimerAdresse']);

        Route::Add("/commander/{id}", [$client, 'listeProduit']);
        Route::Add("/commander/{id}/{page}", [$client, 'listeProduit']);
        Route::Add("/commande/{idClient}/{idProduit}", [$client, 'commander']);

        Route::Add("/ajoutAdresse/{id}", [$client, 'listeAdresse']);
        Route::Add("/ajoutAdresse/{id}/{page}", [$client, 'listeAdresse']);
        Route::Add("/adresse/{idClient}", [$client, 'ajouterAdresse']);

        Route::Add("/ajoutDuClient", [$client, 'ajouterClient']);
        Route::Add("/ajouterClient", function () {
            return Template::render('views/global/ajouterClient.php');
        });

        Route::Add("/ajoutContact/{id}", [$client, 'ajouterContact']);
        Route::Add("/ajoutDuContact/{id}", [$client, 'ajouterUnContact']);
        Route::Add("/supprimerContact/{idClient}/{idContact}", [$client, 'supprimerContact']);

    }
}

