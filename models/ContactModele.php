<?php
namespace models;

use models\base\SQL;
use models\classes\Contact;
use models\classes\Produit;

class ContactModele extends SQL
{
    public function __construct()
    {
        parent::__construct('contact', 'idContact');
    }

    public function creerContact(Contact $unContact, int $clientId = null): bool|string
    {
        $query = "INSERT INTO contact(idContact, nomContact, numContact, emailContact) VALUE (null, ?, ?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$unContact->getNom(), $unContact->getNumContact(), $unContact->getEmail()]);

        $idContact = $this->getPdo()->lastInsertId();

        if($clientId != null){
            $this->affecterContact($idContact, $clientId);
        }

        return $idContact;
    }

    public function affecterContact(int $idContact, int $idClient) :void{
        $query = "INSERT INTO contacter(idContact, idClient) VALUE (?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$idContact, $idClient]);
    }

    public function lesContactsClient(string $clientId): array
    {
        $query = "SELECT contact.* FROM contact INNER JOIN contacter ON contacter.idContact = contact.idContact INNER JOIN client ON client.id = contacter.idClient WHERE idClient = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$clientId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }

}