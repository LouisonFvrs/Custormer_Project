<?php

namespace routes;

use controllers\ClientController;
use controllers\SampleWebController;
use routes\base\Route;
use utils\Template;

class Web
{
    function __construct()
    {
        $client = new ClientController();

        Route::Add("/", [$client, 'listeClient']);
        Route::Add('/{page}', [$client, 'listeClient']);

        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

    }
}

