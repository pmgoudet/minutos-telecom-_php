<?php

include "../utils/utils.php";
include "../models/modelAdmin.php";
include "../view/viewHeader.php";
include "../view/viewPageEditAdmin.php";
include "../view/viewFooter.php";

session_start();

class ControllerEditAdmin
{

  private ?ViewPageEditAdmin $viewPageEditAdmin;
  private ?ViewHeader $viewHeader;
  private ?ViewFooter $viewFooter;
  private ?ModelAdmin $modelAdmin;

  //CONSTRUCT

  public function __construct(?ViewPageEditAdmin $viewPageEditAdmin, ?ModelAdmin $newModelAdmin)
  {
    $this->viewPageEditAdmin = $viewPageEditAdmin;
    $this->modelAdmin = $newModelAdmin;
  }

  //GETTER ET SETTER

  public function getViewPageAddAdmin(): ?ViewPageEditAdmin
  {
    return $this->viewPageEditAdmin;
  }

  public function setViewPageAddAdmin(?ViewPageEditAdmin $viewPageEditAdmin): self
  {
    $this->viewPageEditAdmin = $viewPageEditAdmin;
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

  public function showAdmin(): string
  {

    $data = $this->getModelAdmin()->setEmail($_SERVER['email'])->getByEmail();



    return '';
  }

  public function editAdmin(): string
  {
    return '';
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getViewPageAddAdmin()->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$editAdmin = new ControllerEditAdmin(new ViewPageEditAdmin(), new ModelAdmin);
$editAdmin->render();
