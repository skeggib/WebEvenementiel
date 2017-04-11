<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
	
	<?php include __DIR__ . "/parts/head.html"; ?>

</head>
<body>

	<?php include __DIR__ . "/parts/header.html"; ?>
	<?php include __DIR__ . "/parts/nav.html"; ?>

	<section class="contents">
		<h2 id="ModifierMDP">Modification du Mot de Passe</h2>
		<form method="" enctype="multipart/form-data" action="">
		
		<fieldset>
		<label for="mdp_old">Ancien Mot de passe :  </label>
			<input type="password" name="mdp_old" id="mdp_old" ></br>

		<label for="mdp_new1">Nouveau Mot de passe :  </label>
			<input type="password" name="mdp_new1" id="mdp_new1" ></br>

		<label for="mdp_new2">Confimation Mot de passe :  </label>
			<input type="password" name="mdp_new2" id="mdp_new2" ></br>
		</fieldset></br>
		<input type="reset" value="Réinitialiser" /> <br />
		<input type="submit" value="Modifier" /> <br />
	</section>
</body>
</html>