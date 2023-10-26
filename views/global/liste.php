<div class="container mt-5">
    <div class="row">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form class="form" method="POST" action='/liste'>
                    <input type="text" name="search" class="form-control form-input" placeholder="Rechercher un client...">
                </form>
            </div>
        </div>
    </div>

        <div class="card mb-5 mt-5">
            <div class="card-body">
                <h3>Les clients</h3>
            </div>
        </div>
            <div class="card">
                <table class="table table-hover table-striped">
                    <caption>
                        Page : <?= $page ?>
                        <span class="arrow">
                            <?php if ($page != 0) { ?>
                                <a href="/liste/<?=$page-1?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></a>
                            <?php } ?>
                            <a href="/liste/<?=$page+1?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                            </a>
                        </span>

                    </caption>
                    <thead class="thead-dark">
                    <tr class="userTable">
                        <th scope="col">Id</th>
                        <th scope="col">Nom Prénom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th>
                            <a id="ajoutClient">
                                <button class="btn btn-success">
                                    <svg class="svgPlus" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                    <span>Client</span>
                                </button>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listeClient as $client) { ?>
                    <tr>
                            <th scope="row"><?= $client->id?></th>
                            <td><?= $client->nom . " " . $client->prenom?></td>
                            <td><?= $client->telephone?></td>
                            <td><?= $client->email?></td>
                            <td>
                                <a href="/client/<?=$client->id?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                                </a>
                            </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>

<script>

    function isPhoneNumberValid(phoneNumber) {
        const phoneRegex = /^[0-9]{10}$/;
        return phoneRegex.test(phoneNumber);
    }

    function isEmailValid(email) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailRegex.test(email);
    }

    function isPasswordValid(password) {
        const passwordRegex = /^(?=.*\d)(?=.*[A-Z])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        return passwordRegex.test(password);
    }

    document.getElementById('ajoutClient').addEventListener('click', function () {
        Swal.fire({
            title: 'Ajouter un client',
            html:
                '<form id="clientForm">' +
                '<input id="nom" class="swal2-input" placeholder="Nom">' +
                '<input id="prenom" class="swal2-input" placeholder="Prénom">' +
                '<input id="telephone" class="swal2-input" placeholder="Numéro de téléphone">' +
                '<input id="email" class="swal2-input" placeholder="Email">' +
                '<input id="password" class="swal2-input" type="password" placeholder="Mot de passe">' +
                '</form>',
            showCancelButton: true,
            confirmButtonText: 'Ajouter',
            cancelButtonText: 'Annuler',
            preConfirm: () => {
                const nom = document.getElementById('nom').value;
                const prenom = document.getElementById('prenom').value;
                const telephone = document.getElementById('telephone').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                // Envoi des données au serveur via une requête POST
                fetch('/ajoutDuClient', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nom: nom,
                        prenom: prenom,
                        telephone: telephone,
                        email: email,
                        password: password
                    })
                })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Échec de la requête');
                    })
                    .then(data => {
                        // Gérez la réponse du serveur ici si nécessaire
                        Swal.fire('Succès', 'Le client a été ajouté avec succès.', 'success');
                    })
                    .catch(error => {
                        // Gérez les erreurs de la requête ici
                        Swal.fire('Erreur', 'Une erreur est survenue lors de l\'ajout du client.', 'error');
                    });



            }
        })
    });
</script>



