<?php

include "../utils/utils.php";
include "../models/modelClient.php";
include "../view/viewHeader.php";
include "../view/viewPageEditClient.php";
include "../view/viewPageAdmin.php";
include "../view/viewFooter.php";

session_start();

class ControllerEditClient
{

  private ?ViewPageEditClient $viewPageEditClient;
  private ?ViewPageAdmin $viewPageAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelClient $modelClient;


  //CONSTRUCT

  public function __construct(?ViewPageEditClient $viewPageEditClient, ?ViewPageAdmin $viewPageAdmin, ?ModelClient $modelClient)
  {
    $this->viewPageEditClient = $viewPageEditClient;
    $this->viewPageAdmin = $viewPageAdmin;
    $this->modelClient = $modelClient;
  }


  //GETTER ET SETTER

  public function getModelClient(): ?ModelClient
  {
    return $this->modelClient;
  }

  public function setModelClient(?ModelClient $modelClient): self
  {
    $this->modelClient = $modelClient;
    return $this;
  }

  public function getViewPageEditClient(): ?ViewPageEditClient
  {
    return $this->viewPageEditClient;
  }

  public function setViewPageEditClient(?ViewPageEditClient $viewPageEditClient): self
  {
    $this->viewPageEditClient = $viewPageEditClient;
    return $this;
  }

  public function getViewPageAdmin(): ?ViewPageAdmin
  {
    return $this->viewPageAdmin;
  }

  public function setViewPageAdmin(?ViewPageAdmin $viewPageAdmin): self
  {
    $this->viewPageAdmin = $viewPageAdmin;
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


  public function script(): void
  {
    $script = "<script src='../../js/edit-data.js'></script>
    <script src='../../js/backoffice-form.js'></script>";
    $this->getViewFooter()->setScript($script);
  }

  public function showClient(): string
  {
    if (isset($_GET['id_client'])) {

      $id = $_GET['id_client'];
      $data = $this->getModelClient()->setId($id)->getById();

      $this->getViewPageEditClient()->setNom($data[0]['nom']);
      $this->getViewPageEditClient()->setPrenom($data[0]['prenom']);
      $this->getViewPageEditClient()->setSexe($data[0]['sexe']);
      $this->getViewPageEditClient()->setDateNaissance($data[0]['date_naissance']);
      $this->getViewPageEditClient()->setAdresse($data[0]['adresse']);
      $this->getViewPageEditClient()->setComplement($data[0]['complement']);
      $this->getViewPageEditClient()->setCodePostal($data[0]['code_postal']);
      $this->getViewPageEditClient()->setVille($data[0]['ville']);
      $this->getViewPageEditClient()->setTelephone($data[0]['telephone']);
      $this->getViewPageEditClient()->setEmail($data[0]['email']);
      $this->getViewPageEditClient()->setPassword($data[0]['password']);
      $this->getViewPageEditClient()->setStatus($data[0]['status']);
    }

    return '';
  }

  public function editClient(): string
  {
    // $msg = '';
    // $id = $_GET['id'];

    // if (isset($_POST['submit-edit-admin'])) {
    //   if (
    //     isset($_POST['nom-edit-admin']) && !empty($_POST['nom-edit-admin'])
    //     && isset($_POST['prenom-edit-admin']) && !empty($_POST['prenom-edit-admin'])
    //     && isset($_POST['email-edit-admin']) && !empty($_POST['email-edit-admin'])
    //   ) {
    //     if (filter_var($_POST['email-edit-admin'], FILTER_VALIDATE_EMAIL)) {
    //       $id = sanitize($_GET['id']);
    //       $nom = sanitize($_POST['nom-edit-admin']);
    //       $prenom = sanitize($_POST['prenom-edit-admin']);
    //       $email = sanitize($_POST['email-edit-admin']);

    //       if (isset($_POST['password-edit-admin'])) {
    //         $password = sanitize($_POST['password-edit-admin']);
    //         $password = password_hash($password, PASSWORD_BCRYPT);
    //       }

    //       try {
    //         $data = $this->getModelAdmin()->setEmail($email)->getByEmail();

    //         //retirer de $data le propre utilisateur pour verifier juste les autres. fn($user) est la fonction callback que verifie que les utilisateurs n'ont pas le meme id que celui ci que l'on edite
    //         $data = array_filter($data, fn($user) => $user['id'] != $id);

    //         //l'adresse mail existe deja, if faut vérifier s'il y a un 2eme
    //         if (empty($data)) {
    //           $this->getModelAdmin()->setId($id)->setNom($nom)->setPrenom($prenom)->setEmail($email);

    //           if (isset($_POST['password-edit-admin'])) {
    //             $this->getModelAdmin()->setPassword($password);
    //           }

    //           $msg = $this->getModelAdmin()->edit();

    //           header("Refresh: 0");
    //         } else {
    //           $msg = "Cet adresse mail existe déjà sur un autre compte.";
    //         }
    //       } catch (EXCEPTION $e) {
    //         $msg = $e->getMessage();
    //       }
    //     } else {
    //       $msg = "Le mail n'est pas au bon format";
    //     }
    //   } else {
    //     $msg = "Veuillez remplir les champs obligatoires.";
    //   }
    // }

    return '';
  }

  public function deleteClient(): void
  {
    // if (isset($_POST['delete-admin'])) {

    //   $id = $_GET['id'];

    //   $msg = $this->getModelAdmin()->setId($id)->delete();
    //   $_SESSION['delete_msg'] = $msg; //! A FINIR

    //   header("Location: ./controllerListeAdmins.php");
    //   exit();
    // }
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->showClient();
    $this->deleteClient();
    echo $this->getViewPageEditClient()->setMessage($this->editClient())->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$editClient = new ControllerEditClient(new ViewPageEditClient(), new ViewPageAdmin(), new ModelClient);
$editClient->render();
