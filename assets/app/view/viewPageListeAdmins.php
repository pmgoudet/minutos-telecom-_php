<?php

class ViewPageListeAdmin
{

  private ?string $message = '';
  private ?string $listAdmins = '';

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  public function getListAdmins(): ?string
  {
    return $this->listAdmins;
  }

  public function setListAdmins(?string $listAdmins): self
  {
    $this->listAdmins = $listAdmins;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
    //!ATENÇÃO NUNCA É <main> NO COMEÇO
    return ('
        <section class="connecte-accueil">
          <div class="connecte-accueil-container">
            <div class="accueil-title">
              <img class="accueil-titre__icon" src="../../img/icon/home-connect-icon-minutos-telecom.svg"
                alt="Ícone Home" />
              <h2 class="accueil-titre__title">Page d\'Accueil</h2>
            </div>
            <div class="options-perso-container">
              <a href="./controllerAddClient.php" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/add-client-icon-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Nouveau Client</h2>
              </a>
              <a href="./controllerLoginAdmin.php" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Liste de Clients</h2>
              </a>
              <a href="./controllerAddAdmin.php" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Nouvel Admin</h2>
              </a>
              <a href="./controllerListeAdmins.php" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Liste des Admins</h2>
              </a>
            </div>
            <div class="liste-clients-container">
              <div class="options-perso">
                <img class="connect-form__icon" src="../../img/icon/liste-clients-dark-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="connect-form__title">Liste de Admins</h2>
              </div>
              <div class="liste-clients">
                <input class="liste-clients__searchbar" type="search" placeholder="Cherchez le client...">
                <ul class="liste-clients__liste">'
      . $this->getListAdmins() .
      '</ul>
              </div>
            </div>
        </section>
        </div>
      </main>
    ');
  }
}
