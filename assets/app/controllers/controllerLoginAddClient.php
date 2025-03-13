<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewPageAdmin.php";
include "../view/viewPageAdminDeco.php";
include "../view/viewFooter.php";

session_start();

class controllerLoginAddClient
{

  private ?ViewPageAdmin $viewPageAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;

  //CONSTRUCT

  public function __construct(?ViewPageAdmin $newViewPageAdmin, ?ViewPageAdminDeco $newViewPageAdminDeco, ?ModelAdmin $newModelAdmin)
  {
    $this->viewPageAdmin = $newViewPageAdmin;
    $this->viewPageAdminDeco = $newViewPageAdminDeco;
    $this->modelAdmin = $newModelAdmin;
  }

  //GETTER ET SETTER

  public function getViewPageAdmin(): ?ViewPageAdmin
  {
    return $this->viewPageAdmin;
  }

  public function setViewPageAdmin(?ViewPageAdmin $viewPageAdmin): self
  {
    $this->viewPageAdmin = $viewPageAdmin;
    return $this;
  }

  public function getViewPageAdminDeco(): ?ViewPageAdminDeco
  {
    return $this->viewPageAdminDeco;
  }

  public function setViewPageAdminDeco(?ViewPageAdminDeco $viewPageAdminDeco): self
  {
    $this->viewPageAdminDeco = $viewPageAdminDeco;
    return $this;
  }

  public function getModelAdmin(): ?ModelAdmin
  {
    return $this->modelAdmin;
  }

  public function setModelAdmin(?ModelAdmin $modelAdmin): self
  {
    $this->modelAdmin = $modelAdmin;
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

  public function seConnecter(): string | null
  {
    $connectionMsg = '';
    if (isset($_POST['submit-admin'])) {

      //variables not vides ou nulls
      if (isset($_POST['login-admin']) && !empty($_POST['login-admin']) && isset($_POST['password-admin']) && !empty($_POST['password-admin'])) {
        //validation adresse mail
        if (filter_var($_POST['login-admin'], FILTER_VALIDATE_EMAIL)) {
          $email = sanitize($_POST['login-admin']);
          $password = sanitize($_POST['password-admin']);

          //verification du mail
          $this->getModelAdmin()->setEmail($email);
          $data = $this->getModelAdmin()->getByEmail();
          if (!empty($data)) {
            if (password_verify($password, $data[0]['password'])) {
              $_SESSION['id'] = $data[0]['id'];
              $_SESSION['nom'] = $data[0]['nom'];
              $_SESSION['prenom'] = $data[0]['prenom'];
              $_SESSION['email'] = $data[0]['email'];

              header("Refresh: 0");
            } else {
              $connectionMsg = "Email et/ou mdp incorrect(s).";
            }
          } else {
            $connectionMsg = "Email et/ou mdp incorrect(s).";
          }
        } else {
          $connectionMsg = "Le mail n'est pas au bon format.";
        }
      } else {
        $connectionMsg = 'Veuillez remplir les champs obligatoires.';
      }
    }

    return $connectionMsg;
  }

  //METHOD

  public function readClients(): string
  {
    $usersList = '';
    return $usersList;
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    if (isset($_SESSION['id'])) {
      echo $this->getViewPageAdmin()->displayView();
    } else {
      echo $this->getViewPageAdminDeco()->setMessage($this->seConnecter())->displayView();
    }

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$admin = new ControllerLoginAdmin(new ViewPageAdmin(), new ViewPageAdminDeco(), new ModelAdmin());
$admin->render();
