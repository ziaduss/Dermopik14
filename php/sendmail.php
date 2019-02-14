<?php

require_once('Mail.php');

if (isset($_POST['email']))
{
  $email = htmlspecialchars($_POST['email']);
  if (filter_var($email, FILTER_VALIDATE_EMAIL))
	{
    $new_mail = new Mail($email);
    $new_mail->send_result_mail();
    header('Location: ../resultats.php');
  }
  else
    echo "L'adresse email n'est pas valide";
}
else
  echo "Les données transmissent ne sont pas valides";
