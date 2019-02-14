<?php

require_once('App.php');


// NE FONCTIONNE PAS


// Vérification de l'existence d'un cookie pour la connexion automatique
if(isset($_COOKIE['auth']) && !isset($_SESSION['pharmacie_id']))
{
	$auth = htmlspecialchars($_COOKIE['auth']);
	$auth = explode('---', $auth);
	$user = App::getDb()->prepare('
		SELECT * FROM pharmacie WHERE id = ?',
		[$auth[0]], true, true, false);
	$key = sha1($user->nom . $user->pass . $_SERVER['REMOTE_ADDR']);
	// Correspondance entre la key de la bdd et celle du cookie
	if ($key == $auth[1])
	{
		$_SESSION['pharmacie_id'] = $user->id;
		$_SESSION['pharmacie_name'] = $user->nom;
		setcookie('auth', $user->id . '---' . $key, time() + 3600 * 24 * 365, null, null, false, true);
    //header('Location: ./questions.php');
	}
	else
		setcookie('auth', '', time() - 3600, null, null, false, true);
}
