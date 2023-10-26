<div class="container mt-5">
    <div class="row">

        <div class="card mb-5 mt-5">
            <div class="card-body">
                <h3>Données générales</h3>
            </div>
        </div>

        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-3">
                <div class="card profil">
                    <div class="card-body" style="color: white">
                        <h6 class="card-title">Nom</h6>
                        <p class="card-text"><?= $client->getNom() ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card profil">
                    <div class="card-body" style="color: white">
                        <h6 class="card-title">Prénom</h6>
                        <p class="card-text"><?= $client->getPrenom() ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card profil">
                    <div class="card-body" style="color: white">
                        <h6 class="card-title">Email</h6>
                        <p class="card-text"><?= $client->getEmail() ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card profil">
                    <div class="card-body" style="color: white">
                        <h6 class="card-title">Téléphone</h6>
                        <p class="card-text"><?= $client->getTelephone() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($client->lesProduits())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les produits</h3>
                </div>
            </div>

            <div class="card">
                <table class="table table-hover table-striped w-70">
                    <thead class="thead-dark">
                    <tr class="userTable">
                        <th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">
                            <a href="/commander/<?= $client->getId() ?>">
                                <button class="btn btn-success">
                                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                         viewBox="0 0 448 512">
                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                    </svg>
                                    <span>Commander</span>
                                </button>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($client->lesProduits() as $leProduit) { ?>
                        <tr>
                            <th scope="row"><?= $leProduit->getId(); ?></th>
                            <td><?= $leProduit->getNom(); ?></td>
                            <td><?= $leProduit->getDescription(); ?></td>
                            <td><?= $leProduit->getPrix(); ?></td>
                            <td>
                                <a href="supprimerProduit/<?= $leProduit->getId()?>">
                                    <button type="button" id="<?= $leProduit->getId()?>" class="btn btn-danger">Supprimer</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <?php if (empty($client->lesProduits())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les produits</h3>
                </div>
            </div>
            <a href="/commander/<?= $client->getId() ?>">
                <button class="btn btn-success">
                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                    </svg>
                    <span>Commander</span>
                </button>
            </a>
        <?php } ?>

        <?php if (!empty($client->lesAdresses())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les adresses</h3>
                </div>
            </div>

            <div class="card">
                <table class="table table-hover table-striped w-70">
                    <thead class="thead-dark">
                    <tr class="userTable">
                        <th scope="col">Nom</th>
                        <th scope="col">Rue</th>
                        <th scope="col">Code postal</th>
                        <th scope="col">Ville</th>
                        <th scope="col">
                            <a href="/ajoutAdresse/<?= $client->getId() ?>">
                                <button class="btn btn-success">
                                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                         viewBox="0 0 448 512">
                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                    </svg>
                                    <span>Ajouter</span>
                                </button>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($client->lesAdresses() as $adress) { ?>
                        <tr>
                            <th scope="row"><?= $adress->getNom(); ?></th>
                            <td><?= $adress->getRue(); ?></td>
                            <td><?= $adress->getCodePostal(); ?></td>
                            <td><?= $adress->getVille(); ?></td>
                            <td>
                                <a href="/supprimerAdresse/<?= $client->getId()?>/<?= $adress->getId()?>">
                                    <button type="button" id="<?= $adress->getId()?>" class="btn btn-danger">Supprimer</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <?php if (empty($client->lesAdresses())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les adresses</h3>
                </div>
            </div>
            <a href="/ajoutAdresse/<?= $client->getId() ?>">
                <button class="btn btn-success">
                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                    </svg>
                    <span>Ajouter</span>
                </button>
            </a>

        <?php } ?>

        <?php if (!empty($client->lesContacts())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les Contacts</h3>
                </div>
            </div>

            <div class="card">
                <table class="table table-hover table-striped w-70">
                    <thead class="thead-dark">
                    <tr class="userTable">
                        <th scope="col">Nom</th>
                        <th scope="col">Numéro</th>
                        <th scope="col">Email</th>
                        <th scope="col">
                            <a href="/ajoutContact/<?= $client->getId() ?>">
                                <button class="btn btn-success">
                                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                         viewBox="0 0 448 512">
                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                    </svg>
                                    <span>Ajouter</span>
                                </button>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($client->lesContacts() as $contact) { ?>
                        <tr>
                            <th scope="row"><?= $contact->getNom(); ?></th>
                            <td><?= $contact->getNumContact(); ?></td>
                            <td><?= $contact->getEmail(); ?></td>
                            <td>
                                <a href="/supprimerContact/<?= $client->getId() ?>/<?= $contact->getId() ?>">
                                    <button type="button" id="<?= $contact->getId()?>" class="btn btn-danger">Supprimer</button>

                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <?php if (empty($client->lesContacts())) { ?>
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <h3>Les contacts</h3>
                </div>
            </div>
            <a href="/ajoutContact/<?= $client->getId() ?>">
                <button class="btn btn-success">
                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                    </svg>
                    <span>Ajouter</span>
                </button>
            </a>
        <?php } ?>
    </div>
</div>
</div>
</div>
