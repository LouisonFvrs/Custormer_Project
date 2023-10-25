<div class="container mt-5">
    <div class="card mb-5 mt-5">
        <div class="card-body">
            <h3>Ajouter client</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="/ajoutDuClient">
                <div class="form-group mt-3">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">
                </div>
                <div class="form-group mt-3">
                    <label for="rue">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom">
                </div>
                <div class="form-group mt-3">
                    <label for="codePostal">Email :</label>
                    <input type="text" class="form-control" id="email" placeholder="Entrez votre email" name="email">
                </div>
                <div class="form-group mt-3">
                    <label for="ville">Téléphone :</label>
                    <input type="text" class="form-control" id="telephone" placeholder="Entrez votre téléphone" name="telephone">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>
