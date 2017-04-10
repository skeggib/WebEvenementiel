CREATE TABLE lieu (
	id_lieu INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	num_rue_lieu VARCHAR(256),
	nom_rue_lieu VARCHAR(256) NOT NULL,
	nom_ville_lieu VARCHAR(256) NOT NULL,
	cp_lieu INTEGER NOT NULL
);

CREATE TABLE utilisateur (
	id_utilisateur INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	pseudo_utilisateur VARCHAR(256) NOT NULL UNIQUE,
	civilite_utilisateur INTEGER NOT NULL,
	nom_utilisateur VARCHAR(256) NOT NULL,
	prenom_utilisateur VARCHAR(256) NOT NULL,
	mdp_utilisateur VARCHAR(1024) NOT NULL,
	id_lieu INTEGER NOT NULL,
	telephone_utilisateur VARCHAR(256),
	mobile_utilisateur VARCHAR(256),
	email_utilisateur VARCHAR(256) NOT NULL,
	actif_utilisateur BOOLEAN NOT NULL,
	FOREIGN KEY (id_lieu) REFERENCES lieu(id_lieu)
);

CREATE TABLE evenement (
	id_evenement INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom_evenement VARCHAR(256) NOT NULL,
	id_organisateur INTEGER NOT NULL,
	date_debut_evenement DATETIME NOT NULL,
	date_fin_evenement DATETIME NOT NULL,
	id_lieu INTEGER NOT NULL,
	actif_evenement BOOLEAN NOT NULL,
	commentaire_evenement VARCHAR(4096),
	FOREIGN KEY (id_organisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_lieu) REFERENCES lieu(id_lieu)
);

CREATE TABLE participe (
	id_utilisateur INTEGER NOT NULL,
	id_evenement INTEGER NOT NULL,
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
	FOREIGN KEY (id_evenement) REFERENCES evenement(id_evenement)
);