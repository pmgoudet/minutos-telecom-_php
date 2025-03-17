<?php

class ViewLoginClient
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
            <a href="#" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/donnes-personnelles-connect-icon-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Données Personnelles</h2>
            </a>
            <a href="#" class="options-perso">
              <img class="options-perso__icon" src="../../img/icon/password-connect-icon-minutos-telecom.svg"
                alt="Ícone Dados Pessoais" />
              <h2 class="options-perso__title">Mot de Passe</h2>
            </a>
          </div>
          <div class="options-utilisateur">
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
            <div class="options-utilisateur__card">
              <div class="options-utilisateur__card__title">
                <img class="options-utilisateur__card__title-icon" src="../../img/icon/duplicata-icon-minutos-telecom.svg"
                  alt="Ícone de Segunhda Via do Boleto" />
                <p class="options-utilisateur__card__title-text">
                  Duplicata de Facture
                </p>
              </div>
              <p class="options-utilisateur__card__text">
                Émission de la duplicata de votre facture.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    ');
  }
}
