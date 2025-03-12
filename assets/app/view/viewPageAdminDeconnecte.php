<?php

class ViewPageAdminDeco
{

  //METHOD
  public function displayView(): string
  {
    return ('
      <main>
        <section class="banner-container">
          <div class="banner-img"></div>
          <div class="banner-txt">
            <div class="banner-txt-container">
              <div class="banner-txt-container__title-flex">
                <h1 class="banner-txt__title">Área do Admin</h1>
                <img class="banner-txt__icon" src="../../img/icon/area-do-cliente-icon-minutos-telecom.svg" />
              </div>
              <p class="banner-txt__texto">
                Bem-vindo, <strong>Minutos</strong>.
              </p>
            </div>
          </div>
        </section>

        <section class="login-container">
          <h2 class="login-container__titulo">Central do Admin</h2>
          <form class="login-form" action="" method="POST" name="form">
            <label for="login-admin">Login:</label>
            <input type="text" id="login-admin" name="login-admin" placeholder="Digite seu e-mail"
              maxlength="18" required />
            <label for="password-admin">Senha:</label>
            <input type="password" id="password-admin" name="password-admin" minlength="8" maxlength="20"
              placeholder="Digite sua senha" required />
            <button type="submit" name="submit-admin" class="button-flex">
              <p>Entrar</p>
              <img src="../../img/icon/porta-icon-minutos-telecom.svg" alt="Ícone de entrar para se conectar" />
            </button>
          </form>
        </section>
      </main>
    ');
  }
}
