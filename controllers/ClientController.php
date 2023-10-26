<?php
namespace controllers;

use controllers\base\WebController;
use models\AdresseModel;
use models\AuthModel;
use models\classes\Adresse;
use models\classes\Client;
use models\classes\Contact;
use models\ClientsModele;
use models\ContactModele;
use models\ProduitsModele;
use utils\Template;

class ClientController extends WebController
{
    private ClientsModele $clientsModele;
    private  ProduitsModele $produitsModele;
    private AdresseModel $adresseModel;
    private ContactModele $contactModele;

    function __construct(){
        $this->clientsModele = new ClientsModele();
        $this->produitsModele = new ProduitsModele();
        $this->adresseModel = new AdresseModel();
        $this->contactModele = new ContactModele();
    }

    // Retourne la liste des clients
    function listeClient($search, $page = 0): string {

        if (!empty($search)) {
            $clients = $this->clientsModele->recherche($search, 10 ,$page);
        } else {
            $clients = $this->clientsModele->liste(10, $page);
        }

        return Template::render(
            "views/global/liste.php",
            array("page" => $page, "listeClient" => $clients)
        );
    }

    // Lister les produits pour un client
    function listeProduit($id, $page = 0): string {
        $produits = $this->produitsModele->getProduits($id,10, $page);

        return Template::render("views/global/produit.php", array("page" => $page, "listeProduit" => $produits, "idClient" => $id));
    }

    // Effectuer une commande d'un produit pour un client
    function commander($idClient, $idProduit): string {

        $this->produitsModele->affecterProduit($idProduit, $idClient);

        $this->redirect('/client/' . $idClient);
    }

    function listeAdresse($id="", $page = 0): string {
        $idClient = $id;
        return Template::render("views/global/adresse.php", array("page" => $page, "idClient" => $id));
    }

    function ajouterAdresse($idClient, $nom, $rue, $codePostal, $ville) {

        $adresse = new Adresse();


        $adresse->setNom(htmlspecialchars($nom));
        $adresse->setRue(htmlspecialchars($rue));
        $adresse->setCodePostal(htmlspecialchars($codePostal));
        $adresse->setVille(htmlspecialchars($ville));
        $adresse->setClientId(htmlspecialchars($idClient));

        $value = $this->adresseModel->creerAdresseClient($adresse);
        $this->redirect('/client/' . $idClient);
    }

    function ajouterClient(): string {

        $client = new Client();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        var_dump($nom, $email, $prenom);
        die();

        $client->setNom(htmlspecialchars($nom));
        $client->setPrenom(htmlspecialchars($prenom));
        $client->setEmail(htmlspecialchars($email));
        $client->setTelephone(htmlspecialchars($telephone));

        $value = $this->clientsModele->creerClient($client);

        $this->redirect('/');
    }

    public function ajouterContact($id): string {
        $idClient = $id;
        return Template::render("views/global/contact.php", array("idClient" => $id));
    }

    public function ajouterUnContact($id, $nom, $email, $num): string {

        $contact = new Contact();
        $contact->setNom(htmlspecialchars($nom));
        $contact->setNumContact(htmlspecialchars($num));
        $contact->setEmail(htmlspecialchars($email));

        $value = $this->contactModele->creerContact($contact, $id);
        $this->redirect('/client/' . $idClient);


    }

    function  connexion() {
        $this->redirect("/liste");
    }
}