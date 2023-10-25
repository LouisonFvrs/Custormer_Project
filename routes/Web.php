<?php

namespace routes;

use controllers\ClientController;
use controllers\FicheController;
use controllers\SampleWebController;
use routes\base\Route;
use utils\Template;

class Web
{
    function __construct()
    {
        $client = new ClientController();
        $fiche = new FicheController();

        Route::Add("/", [$client, "connexion"]);
        Route::Add("/liste", [$client, 'listeClient']);
        Route::Add('/liste/{page}', [$client, 'listeClient']);
        Route::Add("/client/{id}", [$fiche, 'fiche']);

        Route::Add("/commander/{id}", [$client, 'listeProduit']);
        Route::Add("/commander/{id}/{page}", [$client, 'listeProduit']);
        Route::Add("/commande/{idClient}/{idProduit}", [$client, 'commander']);

        Route::Add("/ajoutAdresse/{id}", [$client, 'listeAdresse']);
        Route::Add("/ajoutAdresse/{id}/{page}", [$client, 'listeAdresse']);
        Route::Add("/adresse/{idClient}", [$client, 'ajouterAdresse']);


        Route::Add("/ajoutDuClient", [$client, 'ajouterClient']);

        Route::Add("/ajoutContact/{id}", [$client, 'ajouterContact']);
        Route::Add("/ajoutDuContact/{id}", [$client, 'ajouterUnContact']);

        Route::Add("/ajouterClient", function () {
            return Template::render('views/global/ajouterClient.php');
        });

        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

    }
}

