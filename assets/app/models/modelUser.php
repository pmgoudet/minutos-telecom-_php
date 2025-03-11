<?php

class User
{
  private int $id;
  private string $nom;
  private string $prenom;
  private string $sexe;
  private DateTime $dateNaissance;
  private string $adresse;
  private string $complement;
  private int $codePostal;
  private string $ville;
  private int $telephone;
  private string $email;
  private PDO $bdd;

  public function __construct()
  {
    $this->bdd = connect();
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function getNom(): string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;
    return $this;
  }

  public function getPrenom(): string
  {
    return $this->prenom;
  }

  public function setPrenom(string $prenom): self
  {
    $this->prenom = $prenom;
    return $this;
  }

  public function getSexe(): string
  {
    return $this->sexe;
  }

  public function setSexe(string $sexe): self
  {
    $this->sexe = $sexe;
    return $this;
  }

  public function getDateNaissance(): DateTime
  {
    return $this->dateNaissance;
  }

  public function setDateNaissance(DateTime $dateNaissance): self
  {
    $this->dateNaissance = $dateNaissance;
    return $this;
  }

  public function getAdresse(): string
  {
    return $this->adresse;
  }

  public function setAdresse(string $adresse): self
  {
    $this->adresse = $adresse;
    return $this;
  }

  public function getComplement(): string
  {
    return $this->complement;
  }

  public function setComplement(string $complement): self
  {
    $this->complement = $complement;
    return $this;
  }

  public function getCodePostal(): int
  {
    return $this->codePostal;
  }

  public function setCodePostal(int $codePostal): self
  {
    $this->codePostal = $codePostal;
    return $this;
  }

  public function getVille(): string
  {
    return $this->ville;
  }

  public function setVille(string $ville): self
  {
    $this->ville = $ville;
    return $this;
  }

  public function getTelephone(): int
  {
    return $this->telephone;
  }

  public function setTelephone(int $telephone): self
  {
    $this->telephone = $telephone;
    return $this;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getBdd(): PDO
  {
    return $this->bdd;
  }

  public function setBdd(PDO $bdd): self
  {
    $this->bdd = $bdd;
    return $this;
  }
}
