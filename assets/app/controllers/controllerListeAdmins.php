<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewPageListeAdmins.php";
include "../view/viewFooter.php";

session_start();

class ControllerListeAdmin
{

  private ?ViewPageListeAdmin $viewPageListeAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;

  //CONSTRUCT

  public function __construct(?ViewPageListeAdmin $viewPageListeAdmin, ?ModelAdmin $newModelAdmin,)
  {
    $this->viewPageListeAdmin = $viewPageListeAdmin;
    $this->modelAdmin = $newModelAdmin;
  }

  //GETTER ET SETTER

  public function getViewPageAdmin(): ?ViewPageListeAdmin
  {
    return $this->viewPageListeAdmin;
  }

  public function setViewPageAdmin(?ViewPageListeAdmin $viewPageListeAdmin): self
  {
    $this->viewPageListeAdmin = $viewPageListeAdmin;
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

  public function readAdmins(): array | string
  {
    $adminList = '';

    $data = $this->getModelAdmin()->getAll();

    foreach ($data as $admin) {
      $adminList = $adminList . "
      <li class='liste-clients__liste__item'>
        <p class='liste-clients__liste__item-nom'>{$admin['prenom']} {$admin['nom']}</p>
        <a href='./controllerEditAdmin.php?id={$admin['id']}' class='liste-clients__liste__item-btn'>Voir</a>
      </li>";
    }

    return $adminList;
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getViewPageAdmin()->setListAdmins($this->readAdmins())->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$listeAdmins = new ControllerListeAdmin(new ViewPageListeAdmin(), new ModelAdmin());
$listeAdmins->render();
