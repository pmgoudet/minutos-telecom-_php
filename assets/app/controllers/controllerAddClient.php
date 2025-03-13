<?php

include "../utils/utils.php";
include "../models/modelClient.php";
include "../view/viewHeader.php";
include "../view/viewPageAdmin.php";
include "../view/viewPageAddClient.php";
include "../view/viewFooter.php";

session_start();

class ControllerAddClient
{

  private ?ViewPageAddClient $viewPageAddClient;
  private ?ModelClient $modelClient;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;

  //CONSTRUCT

  public function __construct(?ViewPageAddClient $newViewPageAddClient, ?ModelClient $newModelClient)
  {
    $this->viewPageAddClient = $newViewPageAddClient;
    $this->modelClient = $newModelClient;
  }

  //GETTER ET SETTER

  public function getViewPageAddClient(): ?ViewPageAddClient
  {
    return $this->viewPageAddClient;
  }

  public function setViewPageAddClient(?ViewPageAdmin $newViewPageAddClient): self
  {
    $this->viewPageAddClient = $newViewPageAddClient;
    return $this;
  }

  public function getModelClient(): ?ModelClient
  {
    return $this->modelClient;
  }

  public function setModelClient(?ModelClient $modelClient): self
  {
    $this->modelClient = $modelClient;
    return $this;
  }

  public function getViewHeader(): ?ViewHeader
  {
    return $this->viewHeader;
  }

  public function setViewHeader(?ViewHeader $viewHeader): self
  {
    $this->viewHeader = $viewHeader;
    return $this;
  }

  public function getViewFooter(): ?ViewFooter
  {
    return $this->viewFooter;
  }

  public function setViewFooter(?ViewFooter $viewFooter): self
  {
    $this->viewFooter = $viewFooter;
    return $this;
  }


  //METHOD

  public function addClient(): string
  {
    $msg = '';

    //btn submit
    if (isset($_POST['submit-add-client'])) {
      //variables not vides ou nulls
      if (
        isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['prenom']) && !empty($_POST['prenom'])
        && isset($_POST['sexe']) && !empty($_POST['sexe'])
        && isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])
        && isset($_POST['adresse']) && !empty($_POST['adresse'])
        && isset($_POST['code_postal']) && !empty($_POST['code_postal'])
        && isset($_POST['ville']) && !empty($_POST['ville'])
        && isset($_POST['telephone']) && !empty($_POST['telephone'])
        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
      ) {

        //validation adresse mail
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

          //complement peut etre null
          $complement = isset($_POST['complement']) && !empty($_POST['complement']) ? $_POST['complement'] : null;

          $nom = sanitize($_POST['nom']);
          $prenom = sanitize($_POST['prenom']);
          $sexe = sanitize($_POST['sexe']);
          $dateNaissance = sanitize($_POST['date_naissance']);
          $adresse = sanitize($_POST['adresse']);
          $complement = sanitize($_POST['complement']);
          $codePostal = sanitize($_POST['code_postal']);
          $ville = sanitize($_POST['ville']);
          $telephone = sanitize($_POST['telephone']);
          $email = sanitize($_POST['email']);
          $password = sanitize($_POST['password']);
          $status = sanitize($_POST['status']);


          //verification du mail
          try {
            $data = $this->getModelClient()->setEmail($email)->getByEmail();

            if (empty($data)) {
              $this->getModelClient()->setNom($nom)->setPrenom($prenom)->setSexe($sexe)->setDateNaissance($dateNaissance)->setAdresse($adresse)->setComplement($complement)->setCodePostal($codePostal)->setVille($ville)->setTelephone($telephone)->setEmail($email)->setPassword($password)->setStatus($status);

              $msg = $this->getModelClient()->add();
            } else {
              $msg =  "Cet adresse mail existe déjà sur un autre compte.";
            }
          } catch (EXCEPTION $e) {
            $msg = $e->getMessage();
          }
        } else {
          $msg = "Le mail n'est pas au bon format";
        }
      } else {
        $msg = "Veuillez remplir les champs obligatoires.";
      }
    }
    return $msg;
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getViewPageAddClient()->setMessage($this->addClient())->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$client = new ControllerAddClient(new ViewPageAddClient(), new ModelClient());
$client->render();