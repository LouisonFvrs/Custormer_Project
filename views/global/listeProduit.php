<div class="container mt-5">
    <div class="row">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form class="form" method="POST" action='/liste-produit'>
                    <input type="text" name="search" class="form-control form-input" placeholder="Rechercher un produit...">
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-5 mt-5">
        <div class="card-body">
            <h3>Les produits</h3>
        </div>
    </div>
    <div class="card">
        <table class="table table-hover table-striped">
            <caption>
                Page : <?= $page ?>
                <span class="arrow">
                            <?php if ($page != 0) { ?>
                                <a href="/liste-produit/<?=$page-1?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></a>
                            <?php } ?>
                            <a href="/liste-produit/<?=$page+1?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                            </a>
                        </span>

            </caption>
            <thead class="thead-dark">
            <tr class="userTable">
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th>
                    <a id="ajoutProduit">
                        <button class="btn btn-success">
                            <svg class="svgPlus" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                            <span>Produit</span>
                        </button>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listeProduit as $produit) { ?>
                <tr>
                    <th scope="row"><?= $produit->getId()?></th>
                    <td><?= $produit->getNom()?></td>
                    <td><?= $produit->getDescription()?></td>
                    <td><?= $produit->getPrix()?>€</td>
                    <td>
                        <a href="/supprimerProduit/<?= $produit->getId()?>">
                            <button type="button" id="<?= $produit->getId()?>" class="btn btn-danger">Supprimer</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>




