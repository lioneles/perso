//

<?php
//recupération du css
include '../component/head.php';


function verifPost($postContact){
  $values = array ("nom" => '',
                  "prenom" => '',
                  "mail" => '',
                  "projet" => ''
                  );
    foreach($postContact as $key => $value){
      switch ($key){
        case 'nom':
        case 'prenom':
          if(!empty($value) &&
              preg_match('/[a-zA-Z]/',$value)&&
              strlen($value) <= 25)
          {
            $values[$key] = htmlspecialchars($value);
            break;
          }
          else return "Votre nom ou prénom est vide ou incorrect ! ";

        case 'mail':
          if(filter_var($value, FILTER_VALIDATE_EMAIL)&&
            !empty($value)
            )
          {
            $values[$key] = htmlspecialchars($value);
            break;
          }
          else return "Votre email est vide ou invalide ! ";

        case 'projet':
          if(!empty($value) &&
            strlen($value) <= 500
            )
          {
            $values[$key] = htmlspecialchars($value);
            break;
          }
        else return "Votre message est vide ! ";

        default;
      }
    }
    return $values;
}


function envoiMail(array $values){
  $headers = array('From' => $values['mail'],
                  'Reply-To' => $values['mail'],
                  'X-Mailer' => 'PHP/'. phpversion()
                  );

      return mail('info@lionelesgays.com',
                  'Message pour Lionel',
                  wordwrap($values['projet'], 70, "\r\n"). "\r\n" .
                  "de : " .$values['prenom']. " " . $values['nom']. "\r\n",
                  $headers
                );
}
if ($_POST['envoyer'] === 'envoyer'){
  $post = verifPost($_POST);
  if(gettype($post) === "array")
  {
    if(envoiMail($post)){
      echo '<p class="pMail"> Votre message à bien été envoyé. <p>';
      echo '<button class="button"><a href="../page/home.php">Retour</a></button>';
    }
    else echo '<p class="pMail">Le mail n\'a pas été envoyé! </p>';
  }
    else echo '<p class="pMail">'.$post.'</p> <button class="button"><a href="../page/contact.php">Retour</a></button>';
}

?>