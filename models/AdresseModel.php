<?php

namespace models;

use models\base\SQL;
use models\classes\Adresse;
use models\classes\Produit;

class AdresseModel extends SQL
{
    public function __construct()
    {
        parent::__construct('adresse', 'id');
    }

    /**
     * Liste les adresses d'un client
     * @param string $clientId
     * @return Adresse[]
     */

    public function getAdresses(int $limit = PHP_INT_MAX, int $page = 0): array {
        $query = "SELECT adresse.* FROM adresse LIMIT :limit,:offset;";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([":limit" => $limit * $page, ":offset" => $limit]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Adresse::class);
    }
    public function lesAdressesClient(string $clientId): array
    {
        $query = "SELECT * FROM adresse WHERE clientId = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$clientId]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Adresse::class);
    }

    /**
     * Ajoute une adresse en base pour le client $clientId
     * @param Adresse $uneAdresse
     * @return string
     */
    public function creerAdresseClient(Adresse $uneAdresse): string
    {
        $query = "INSERT INTO adresse (id, nom, rue, codePostal, ville, clientId) VALUE (NULL, ?, ?, ?, ?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$uneAdresse->getNom(), $uneAdresse->getRue(), $uneAdresse->getCodePostal(), $uneAdresse->getVille(), $uneAdresse->getClientId()]);
        return $this->getPdo()->lastInsertId();
    }

    // Supprimer une adresse d'un client
    public function supprimer($idClient, $idAdresse) {
        $query = "DELETE from adresse WHERE adresse.id = ? and adresse.clientId = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$idAdresse, $idClient]);
    }


}