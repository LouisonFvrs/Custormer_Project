<div class="container mt-5">
    <div class="card mb-5 mt-5">
        <div class="card-body">
            <h3>Ajouter adresse</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="/adresse/<?=$idClient?>">
                <div class="form-group mt-3">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">
                </div>
                <div class="form-group mt-3">
                    <label for="rue">Rue :</label>
                    <input type="text" class="form-control" id="rue" placeholder="Entrez votre rue" name="rue">
                </div>
                <div class="form-group mt-3">
                    <label for="codePostal">Code Postal :</label>
                    <input type="text" class="form-control" id="codePostal" placeholder="Entrez votre code postal" name="codePostal">
                </div>
                <div class="form-group mt-3">
                    <label for="ville">Ville :</label>
                    <input type="text" class="form-control" id="ville" placeholder="Entrez votre ville" name="ville">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>