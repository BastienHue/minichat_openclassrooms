<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Minichat 2.0</title>

</head>
<body>
	
	<p><strong>Veuillez saisir votre pseudo et votre message : </strong></p>
	<form action="/minichat2/chataccess.php" method="post">
		<p>Pseudo : </p>
		<p><input type="text" name="pseudo" value=""></p>
		<p>Message : </p>
		<p><input type="text" name="message" value=""></p>
		<!--<p><strong>Vous avez saisi toutes les informations demandées, cliquez ci-dessous: </strong></p>-->
		<p><input type="submit" value="Confirmer"/></p>
	</form>

	<?php 
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=MiniChat;charset=utf8', '', '');
	}
	catch(exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	$reponse=$bdd->query('SELECT `pseudo`,`message`,`date_publication` FROM chat_thread ORDER BY ID DESC LIMIT 0,10');

	while ($donnees = $reponse->fetch()) 
	{
		echo '<p><strong>'.htmlspecialchars($donnees['pseudo']).'</strong> ('.htmlspecialchars($donnees['date_publication']).') : '.htmlspecialchars($donnees['message']).'</p>';
	}

	$reponse->closeCursor();

	?>





</body>
</html>
