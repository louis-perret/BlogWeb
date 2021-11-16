<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Page d'erreur</title>
	</head>
	<body>
		<?php
			if(isset($tabErreur)){
				foreach($tabErreur as $erreur){
					echo("Erreur : $erreur <BR/>");
				}
			}
		?>
	</body>
</html>