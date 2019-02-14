<?php

session_start();

require_once('App.php');
require_once('Mail.php');

if (isset($_POST['radioSexe']) && ($_POST['radioSexe'] == 'femme' || $_POST['radioSexe'] == 'homme')
    && isset($_POST['age']) && !empty($_POST['age'])
    && isset($_POST['repQ1']) && ($_POST['repQ1'] == 'oui' || $_POST['repQ1'] == 'non')
    && isset($_POST['repQ2']) && ($_POST['repQ2'] == 'oui' || $_POST['repQ2'] == 'non')
    && isset($_POST['repQ3']) && ($_POST['repQ3'] == 'oui' || $_POST['repQ3'] == 'non')
    && isset($_POST['repQ4']) && ($_POST['repQ4'] == 'oui' || $_POST['repQ4'] == 'non')
    && isset($_POST['repQ5']) && ($_POST['repQ5'] == 'oui' || $_POST['repQ5'] == 'non'))
{

  $age = (int) htmlspecialchars($_POST['age']);
  if (is_int($age))
  {
    $sexe  = ($_POST['radioSexe'] == 'femme') ? 'f' : 'm';
    $repQ1 = ($_POST['repQ1'] == 'oui') ? 1 : 0;
    $repQ2 = ($_POST['repQ2'] == 'oui') ? 1 : 0;
    $repQ3 = ($_POST['repQ3'] == 'oui') ? 1 : 0;
    $repQ4 = ($_POST['repQ4'] == 'oui') ? 1 : 0;
    $repQ5 = ($_POST['repQ5'] == 'oui') ? 1 : 0;
    $pharmaId = $_SESSION['pharmacie_id'];

    // Calcul du pourcentage
    $result = 0;
    if ($repQ1 == 1)
      $result += 1;
    if ($repQ2 == 1)
      $result += 27;
    if ($repQ3 == 1)
      $result += 21;
    if ($repQ4 == 1)
      $result += 26;
    if ($repQ5 == 1)
      $result += 22;

    $data = App::getDb()->prepare('
      INSERT INTO
        questionnaire (id_pharma, date, age, sexe, reponse_Q1, reponse_Q2, reponse_Q3, reponse_Q4, reponse_Q5, resultat)
      VALUES
        (:pharmaId, NOW(), :age, :sexe, :repQ1, :repQ2, :repQ3, :repQ4, :repQ5, :result)',
      [':pharmaId' => $pharmaId,
      ':age' => $age,
      ':sexe' => $sexe,
      ':repQ1' => $repQ1,
      ':repQ2' => $repQ2,
      ':repQ3' => $repQ3,
      ':repQ4' => $repQ4,
      ':repQ5' => $repQ5,
      ':result' => $result],
    false);

    $_SESSION['form_result'] = $result;

    header('Location: ../resultats.php');
  }
  else
    echo "L'age doit etre un nombre entier";

}
else
  echo "Les données transmissent ne sont pas valides";
