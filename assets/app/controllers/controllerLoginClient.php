<?php

session_start();

include "../utils/utils.php";
include "../models/modelClient.php";
include "../view/viewLoginClient.php";
include "../view/viewHeader.php";
include "../view/viewFooter.php";


class ControllerLoginClient
{

  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelClient $modelClient;
  private ?ViewLoginClient $viewLoginClient;

  public function __construct(?ModelClient $newModelClient, ?ViewLoginClient $viewLoginClient)
  {
    $this->modelClient = $newModelClient;
    $this->viewLoginClient = $viewLoginClient;
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

  public function getViewLoginClient(): ?ViewLoginClient
  {
    return $this->viewLoginClient;
  }

  public function setViewLoginClient(?ViewLoginClient $viewLoginClient): self
  {
    $this->viewLoginClient = $viewLoginClient;
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
    $script = "";
    $this->getViewFooter()->setScript($script);
  }

  public function seConnecter(): string
  {
    $connectionMsg = '';
    if (isset($_POST['submit-client'])) {

      //variables not vides ou nulls
      if (isset($_POST['email-client']) && !empty($_POST['email-client']) && isset($_POST['password-client']) && !empty($_POST['password-client'])) {
        //validation adresse mail
        if (filter_var($_POST['email-client'], FILTER_VALIDATE_EMAIL)) {
          $email = sanitize($_POST['email-client']);
          $password = sanitize($_POST['password-client']);

          //verification du mail
          $data = $this->getModelClient()->setEmail($email)->getByEmail();

          if (!empty($data)) {
            if (password_verify($password, $data[0]['password'])) {
              $_SESSION['id'] = $data[0]['id'];
              $_SESSION['prenom'] = $data[0]['prenom'];
              $_SESSION['nom'] = $data[0]['nom'];
              $_SESSION['sexe'] = $data[0]['sexe'];
              $_SESSION['date_naissance'] = $data[0]['date_naissance'];
              $_SESSION['adresse'] = $data[0]['adresse'];
              $_SESSION['complement'] = $data[0]['complement'];
              $_SESSION['code_postal'] = $data[0]['code_postal'];
              $_SESSION['ville'] = $data[0]['ville'];
              $_SESSION['telephone'] = $data[0]['telephone'];
              $_SESSION['email'] = $data[0]['email'];

              header('Location:controllerLoginClient.php');
              exit();
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

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->seConnecter();
    echo $this->getViewLoginClient()->displayView();

    $this->setViewFooter(new ViewFooter);
    $this->script();
    echo $this->getViewFooter()->displayView();
  }
}

$loginClient = new ControllerLoginClient(new ModelClient(), new ViewLoginClient());
$loginClient->render();
