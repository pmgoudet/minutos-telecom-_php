<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewPageAddAdmin.php";
include "../view/viewFooter.php";

session_start();

class ControllerAddAdmin
{

  private ?ViewPageAddAdmin $viewPageAddAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;

  //CONSTRUCT

  public function __construct(?ViewPageAddAdmin $newViewPageAddAdmin, ?ModelAdmin $newModelAdmin)
  {
    $this->viewPageAddAdmin = $newViewPageAddAdmin;
    $this->modelAdmin = $newModelAdmin;
  }

  //GETTER ET SETTER

  public function getViewPageAddAdmin(): ?ViewPageAddAdmin
  {
    return $this->viewPageAddAdmin;
  }

  public function setViewPageAddAdmin(?ViewPageAddAdmin $viewPageAddAdmin): self
  {
    $this->viewPageAddAdmin = $viewPageAddAdmin;
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

  public function getModelAdmin(): ?ModelAdmin
  {
    return $this->modelAdmin;
  }

  public function setModelAdmin(?ModelAdmin $modelAdmin): self
  {
    $this->modelAdmin = $modelAdmin;
    return $this;
  }

  //METHOD

  public function addAdmin(): string
  {
    $msg = '';

    //btn submit
    if (isset($_POST['submit-new-admin'])) {
      //variables not vides ou nulls
      if (
        isset($_POST['nom-new-admin']) && !empty($_POST['nom-new-admin'])
        && isset($_POST['prenom-new-admin']) && !empty($_POST['prenom-new-admin'])
        && isset($_POST['email-new-admin']) && !empty($_POST['email-new-admin'])
        && isset($_POST['password-new-admin']) && !empty($_POST['password-new-admin'])
      ) {

        //validation adresse mail
        if (filter_var($_POST['email-new-admin'], FILTER_VALIDATE_EMAIL)) {
          $nom = sanitize($_POST['nom-new-admin']);
          $prenom = sanitize($_POST['prenom-new-admin']);
          $email = sanitize($_POST['email-new-admin']);
          $password = sanitize($_POST['password-new-admin']);
          $password = password_hash($password, PASSWORD_BCRYPT);

          //verification du mail
          try {
            $data = $this->getModelAdmin()->setEmail($email)->getByEmail();

            if (empty($data)) {
              $this->getModelAdmin()->setNom($nom)->setPrenom($prenom)->setEmail($email)->setPassword($password);

              $msg = $this->getModelAdmin()->add();
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

    echo $this->getViewPageAddAdmin()->setMessage($this->addAdmin())->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$addAdmin = new ControllerAddAdmin(new ViewPageAddAdmin(), new ModelAdmin);
$addAdmin->render();
