<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
	
	<?php include __DIR__ . "/parts/head.html"; ?>

</head>
<body>

	<?php include __DIR__ . "/parts/header.html"; ?>
	<?php include __DIR__ . "/parts/nav.html"; ?>
	
	<section class="contents">
		<h2 id="CreerEvt">Créer un évenement</h2>
		<form method="" enctype="multipart/form-data" action="">
			<label for="nomeve">Nom de l'événement :  </label>
			<input type="text" name="nomeve" id="nomeve" ><br />

			<label for="dateve" >Date du début :  </label>
			<input type="text" name="dateve" id="dateve" value="format: dd/mm/yyyy" >
			<label for="heureve" >Heure du début :  </label>
			<input type="text" name="heureve" id="heureve" value="format: hh:mm" ><br />

			<label for="dateve" >Date de fin :  </label>
			<input type="text" name="dateve" id="dateve" value="format: dd/mm/yyyy" >
			<label for="heureve" >Heure de fin :  </label>
			<input type="text" name="heureve" id="heureve" value="format: hh:mm" ><br />
			
			<label for="lieu">Lieu :  </label>
			<fieldset>
				<label for="Num_Rue">Numéro Rue :  </label>
				<input type="text" name="Num_Rue" id="Num_Rue" >

				<label for="Nom_Rue">Nom Rue :  </label>
				<input type="text" name="Nom_Rue" id="Nom_Rue" >

				<label for="codepostal">Code Postal :  </label>
				<input type="text" name="codepostal" id="codepostal" >

				<label for="ville">Ville :  </label>
				<input type="text" name="ville" id="ville" >
			</fieldset></br>
			
			<label for="typeve" id="typeve">Type de l'événement :</label>
				<select name="typeve" id="typeve">
					<option value="bapteme">Baptême</option>
					<option value="barmitsva">Barmitsva</option>
					<option value="anniversaire">Anniversaire</option>
					<option value="soiree">Soirée</option>
					<option value="communion">Communion</option>
					<option value="mariage">Mariage</option>
					<option value="fiancailles">Fiancailles</option>
					<option value="naissance">Naissance</option>
					<option value="autre">Autre</option>
				</select><br />
				
			<label for="description" id="description">Résumé :  </label>
			<textarea name="description" id="description" cols="70" rows="5">Entrez une description</textarea><br>
			<!-- <label for="nbinv" id="nbinv">Nombre personnes invités :</label>
			<select name="nbinv" id="nbinv">
				<option value="5"><5</option>
				<option value="15"><15</option>
				<option value="30"><30</option>
				<option value="50"><50</option>
				<option value="75"><75</option>
				<option value="100"><100</option>
				<option value="150"><150</option>
				<option value="200"><200</option>
				<option value="250">plus de 200</option>
			</select><br /> -->
			<input type="reset" value="Réinitialiser" /> <br />
			<input type="submit" value="Créer" /> <br />
	</section>
</body>
</html>		