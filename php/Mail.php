<?php

/**
 * Permet les envois de mails
 */
class Mail
{
	private $email;

	/* --------------------------- For custom MAMP  ----------------------------*/
	private $from = 'rcabotia@student.le-101.fr';
	private $host = 'http://localhost:8100';

	public function __construct($email)
	{
		$this->email = $email;
	}

	/**
	 * Permet l'envoi d'un mail
	 * @param  string $email 	Nom d'utilisateur
	 * @param  string $key    Token nécessaire pour accéder à la page de validation du compte
	 */
	public function send_result_mail()
	{
		$subject = "Dermopik | Resultats du questionnaire";

		$message = "
		<html>
			<body>
				<center>
					<h1 style='padding-bottom:30px'>Dermopik</h1>
					<p>Vous trouverez les resultats du questionnaire Dermopik dans le fichier PDF joint a ce mail.</p>
					<br>
					<small>Cet email est automatique, merci de ne pas y répondre.</small>
				</center>
			</body>
		</html>";

		$this->configurationMail($subject, $message);
	}


	private function configurationMail($subject, $message)
	{
		$header = "From: Dermopik <" . $this->from . ">\r\n";
		$header .= "Reply-To: Dermopik <" . $this->from . ">\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "Content-Transfer-Encoding: 8bit\r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";

		mail($this->email, $subject, $message, $header, '-f' . $this->from);
	}
}
