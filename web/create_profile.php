<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
	
	<?php include __DIR__ . "/parts/head.html"; ?>

</head>
<body>

	<?php include __DIR__ . "/parts/header.html"; ?>
	<?php include __DIR__ . "/parts/nav.html"; ?>
	
	<section class="contents">		
		<h2 id="CreerCompte">Créez votre compte</h2>
		
		<form enctype="multipart/form-data" onsubmit="return false;">
			
			<label for="pseudo">Pseudo :</label>
			<input type="text" name="pseudo" id="pseudo">
			<br>
			
			<label for="civilite">Civilité :</label>
			<select name="civilite" id="civilite">
				<option value="1">Monsieur</option>
				<option value="2">Madame</option>
			</select>
			<br>
			
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom">
			<br>
			
			<label for="prenom">Prenom :</label>
			<input type="text" name="prenom" id="prenom">
			<br>
			
			<label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" id="mdp">
			<br>
			
			<label for="naissance">Date de naissance :</label>
			<input type="text" name="naissance" id="naissance" value="format:dd/mm/yyyy">
			<br>
			
			<label for="adresse">Code Postal :</label>
			<input type="text" name="adresse" id="adresse">
			<br>
			
			<label for="ville">Ville :</label>
			<input type="text" name="ville" id="ville">
			<br> 
			
			<label for="tel">Telephone (optionnel) :</label>
			<input type="text" name="tel" id="tel">
			<br>
			
			<label for="mobile">Mobile (optionnel) :</label>
			<input type="text" name="mobile" id="mobile">
			<br>
			
			<label for="mail">Mail :</label>
			<input type="text" name="mail" id="mail">
			<br>
			
			<input type="reset" value="Réinitialiser"/>
			<br>
			<input id="createProfileButton" type="submit" value="Créer"/>
		</form>
	</section>
</body>
</html>		