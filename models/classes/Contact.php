<?php

namespace models\classes;

use models\AdresseModel;
use models\ClientsModele;
use models\ProduitsModele;

class Contact
{
    private string $idContact;
    private string $nomContact;
    private string $numContact;
    private string $emailContact;

    private ClientsModele $clientsModele;
    function __construct()
    {
        $this->clientsModele = new ClientsModele();
    }

    public function getNom(): string
    {
        return $this->nomContact;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nomContact = $nom;
    }

    public function getId(): string
    {
        return $this->idContact;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->idContact = $id;
    }

    public function getNumContact(): string
    {
        return $this->numContact;
    }

    /**
     * @param string $numContact
     */
    public function setNumContact(string $numContact): void
    {
        $this->numContact = $numContact;
    }
    public function getEmail(): string
    {
        return $this->emailContact;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->emailContact = $email;
    }

}