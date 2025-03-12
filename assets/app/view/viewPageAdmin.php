<?php

class ViewPageAdmin
{

  private ?string $message = '';

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $newMessage): self
  {
    $this->message = $newMessage;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
    return ('
      <main>
        <section class="banner-container">
          <div class="banner-img_connect"></div>
          <div class="banner-txt banner-txt_connect">
            <div class="banner-txt-container banner-txt-container_connect">
              <div class="banner-txt-container__title-flex">
                <h1 class="banner-txt__title">Espace Admin</h1>
                <img class="banner-txt__icon" src="../../img/icon/area-do-cliente-icon-minutos-telecom.svg" />
              </div>
              <p class="banner-txt__texto">Bonjour, <strong>Minutos</strong></p>
              <a class="banner-txt__btn banner-txt__btn_connect" href="#">
                Déconnexion
                <img class="banner-txt__btn__icon" src="../../img/icon/logout-icon-minutos-telecom.svg"
                  alt="Ícone de Desconectar" />
              </a>
            </div>
          </div>
        </section>

        <section class="connecte-accueil">
          <div class="connecte-accueil-container">
            <div class="accueil-title">
              <img class="accueil-titre__icon" src="../../img/icon/home-connect-icon-minutos-telecom.svg"
                alt="Ícone Home" />
              <h2 class="accueil-titre__title">Page d\'Accueil</h2>
            </div>
            <div class="options-perso-container">
              <a href="#" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/add-client-icon-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Nouveau Client</h2>
              </a>
              <a href="#" class="options-perso">
                <img class="options-perso__icon" src="../../img/icon/liste-clients-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="options-perso__title">Liste de Clients</h2>
              </a>
            </div>
            <div class="liste-clients-container">
              <div class="options-perso">
                <img class="connect-form__icon" src="../../img/icon/liste-clients-dark-minutos-telecom.svg"
                  alt="Ícone Dados Pessoais" />
                <h2 class="connect-form__title">Liste de Clients</h2>
              </div>
              <div class="liste-clients">
                <input class="liste-clients__searchbar" type="search" placeholder="Cherchez le client...">
                <ul class="liste-clients__liste">
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                  <li class="liste-clients__liste__item">
                    <p class="liste-clients__liste__item-nom">Mélanie Laurent</p>
                    <a href="#" class="liste-clients__liste__item-btn">Voir</a>
                  </li>
                </ul>
              </div>
            </div>
        </section>
        </div>
      </main>
    ');
  }
}
