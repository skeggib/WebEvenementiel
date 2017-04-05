INSERT INTO lieu(id_lieu, num_rue_lieu, nom_rue_lieu, nom_ville_lieu, cp_lieu)
	VALUES(1, "15", "av. des Pasteques", "Bananaville", "62458");

INSERT INTO lieu(id_lieu, num_rue_lieu, nom_rue_lieu, nom_ville_lieu, cp_lieu)
	VALUES(2, "2", "rue du Stylo", "Trousse", "10002");



INSERT INTO utilisateur(id_utilisateur, pseudo_utilisateur, civilite_utilisateur, nom_utilisateur, prenom_utilisateur, mdp_utilisateur, id_lieu, telephone_utilisateur, mobile_utilisateur, email_utilisateur, actif_utilisateur)
	VALUES(1, "thelegend27", 1, "Dutrou", "Jean", "securepass", 2, "0612345678", "0125684865", "thelegend27@gmail.com", 1);

INSERT INTO utilisateur(id_utilisateur, pseudo_utilisateur, civilite_utilisateur, nom_utilisateur, prenom_utilisateur, mdp_utilisateur, id_lieu, email_utilisateur, actif_utilisateur)
	VALUES(2, "bouboule", 1, "Pouet", "Marco", "1234", 1, "marcolebogosse@gmail.com", 0);



INSERT INTO evenement(id_evenement, nom_evenement, id_organisateur, date_debut_evenement, date_fin_evenement, id_lieu, actif_evenement, commentaire_evenement)
	VALUES(1, "Mon anniversaire !", 1, "2018-03-17 15:00:00", "2018-03-18 10:30:00", 2, 1, "Venez avec beacoup de bonbons Tagada.");