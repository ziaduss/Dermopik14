<?php

session_start();

require_once('App.php');


if (isset($_POST['mail']) && !empty($_POST['mail'])
		&& isset($_POST['password']) && !empty($_POST['password']))
{
	$mail     = htmlspecialchars($_POST['mail']);
	$password = htmlspecialchars($_POST['password']);
	if (filter_var($mail, FILTER_VALIDATE_EMAIL))
	{
    $data = App::getDb()->prepare('
			SELECT *
			FROM pharmacie
			WHERE
				email = :email',
			[':email' => $mail],
		true, true, false);

  	if ($mail == $data->email)
  	{
  		$_SESSION['save_email'] = $mail;
  		//if (password_verify($password, $data->pass))
      if ($password == $data->pass)
  		{
  				$_SESSION['save_email'] = null;
  				$_SESSION['pharmacie_id'] = $data->id;
				$_SESSION['pharmacie_name'] = $data->nom;

  				// Si l'utilisateur a coché la case "Se souvenir de moi"
  				if (isset($_POST['remember']))
  					setcookie('auth', $data->id . '---' . sha1($data->nom . $data->pass . $_SERVER['REMOTE_ADDR']), time() + 3600 * 24 * 365, null, null, false, true);
  				header('Location: ../questions.php');
  		}
  		else
  			echo "Mot de passe incorrect";
  	}
  	else
  		echo "Cette adresse email n\'existe pas";
  }
  else
    echo "L'adresse email n'est pas valide";
}
else
	echo "Les données transmissent ne sont pas valides";
