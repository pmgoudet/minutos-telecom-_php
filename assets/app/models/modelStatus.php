<?php

class ModelStatus
{
  private int $id_status;
  private string $nom_status;
  private PDO $bdd;


  //CONSTRUCT

  public function __construct()
  {
    $this->bdd = connect();
  }

  //GETTER ET SETTER

  public function getIdStatus(): int
  {
    return $this->id_status;
  }

  public function setIdStatus(int $id_status): self
  {
    $this->id_status = $id_status;
    return $this;
  }

  public function getNomStatus(): string
  {
    return $this->nom_status;
  }

  public function setNomStatus(string $nom_status): self
  {
    $this->nom_status = $nom_status;
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

  //METHOD

  public function getById(): array | string
  {
    try {
      $req = $this->getBdd()->prepare("SELECT id_status, nom_status` FROM `status` WHERE id_status = ? LIMIT 1");
      $id = $this->getIdStatus();
      $req->bindParam(1, $id, PDO::PARAM_STR);
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_ASSOC);

      return $data;
    } catch (EXCEPTION $e) {
      return $e->getMessage();
    }
  }
}
