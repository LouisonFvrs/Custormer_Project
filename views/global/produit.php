<div class="container mt-5">
<div class="card mb-5 mt-5">
        <div class="card-body">
            <h3>Les produits</h3>
        </div>
    </div>

    <div class="card">
        <table class="table table-hover table-striped w-70">

            <caption>
                Page : <?= $page ?>
                <span class="arrow">
                                <?php if ($page != 0) { ?>
                                    <a href="/commander/<?=$idClient?>/<?=$page-1?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></a>
                                <?php } ?>
                                <a href="/commander/<?=$idClient?>/<?=$page+1?>">
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
                <th scope="col">Commander</th>
            </tr>
            </thead>
            <tbody>

            <?php
            ?>
            <?php foreach ($listeProduit as $leProduit) { ?>
                <tr>
                    <th scope="row"><?=$leProduit->getId();?></th>
                    <td><?=$leProduit->getNom(); ?></td>
                    <td><?= $leProduit->getDescription();?></td>
                    <td><?= $leProduit->getPrix();?></td>
                    <td>
                        <a href="/commande/<?=$idClient?>/<?=$leProduit->getId();?>">
                            <button class="btn btn-success">
                                <svg class="svg2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                <span>Commander</span>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
