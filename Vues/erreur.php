<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="Vues/bootstrap/css/bootstrap.css" type="text/css"/>
    	<link rel="stylesheet" href="Vues/blog.css">

		<title>Page d'erreur</title>
	</head>
	<body>
		<!-- Vue d'erreur -->
		<?php if(isset($tabErreur)) : ?>
			<div class="container blocMain" style="width: auto;">
			<?php foreach($tabErreur as $erreur) : ?>
				<h3>Erreur : <?=$erreur ?></h3>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>
				
	</body>
</html>