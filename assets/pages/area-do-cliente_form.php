<?php

// if (isset($_POST['submit'])) {
//   //variables not vides ou nulls
//   if (
//     isset($_POST['pseudo']) && !empty($_POST['pseudo'])
//     && isset($_POST['email']) && !empty($_POST['email'])
//     && isset($_POST['mdp']) && !empty($_POST['mdp'])
//   ) {

//     //validation adresse mail
//     if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//       $nickname = sanitize($_POST['pseudo']);
//       $email = sanitize($_POST['email']);
//       $password = sanitize($_POST['mdp']);
//       $password = password_hash($password, PASSWORD_BCRYPT);

//       //verification du mail
//       try {
//         $data = $this->getModelUser()->setEmail($email)->getByEmail();

//         if (empty($data)) {
//           $this->getModelUser()->setNickname($nickname)->setEmail($email)->setPassword($password);

//           $this->getViewHome()->setMessage($this->getModelUser()->add());
//         } else {
//           return "Cet adresse mail existe déjà sur un autre compte.";
//         }
//       } catch (EXCEPTION $e) {
//         return $e->getMessage();
//       }
//     } else {
//       return "Le mail n'est pas au bon format";
//     }
//   } else {
//     return "Veuillez remplir les champs obligatoires.";
//   }
//   return '';
// }


// AQUI VAI A PÁGINA A TRATAR O FORMULARIO NO ACTION
// UNE FOIS MIS LE LIEN, JE TRAITE LE FORM NORMALEMENT ET UNE FOIS CONNECTE JE REDIRECT