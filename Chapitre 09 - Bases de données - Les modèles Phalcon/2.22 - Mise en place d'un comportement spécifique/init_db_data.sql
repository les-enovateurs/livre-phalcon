-- creation de la table utilisateurs
CREATE TABLE utilisateurs (
	id bigserial NOT NULL,
	nom varchar NULL,
	prenom varchar NULL,
	email varchar NOT NULL,
	mot_de_passe varchar NOT NULL,
	cree_le timestamp,
	mise_a_jour_le date,
	etat smallint,
	CONSTRAINT utilisateurs_pk PRIMARY KEY (id),
	CONSTRAINT utilisateurs_un UNIQUE (email)
);

-- insertion des données
INSERT INTO utilisateurs (nom,prenom,email,mot_de_passe, etat) VALUES
('DOE','John','john.doe@les-enovateurs.com','azerty', 1)
,('DOE','Louise','louise.doe@les-enovateurs.com','uiopq', 1)
,('DOE','Sébastien','sebastien.doe@les-enovateurs.com','qsdf', 1)
,('DOE','Camille','camille.doe@les-enovateurs.com','ghjk', 1)
,('DOE','Damien','damien.doe@les-enovateurs.com','lmwx', 1)
,('DOE','Sandrine','sandrine.doe@les-enovateurs.com','cvbn', 1)
,('DOE','Philippe','philippe.doe@les-enovateurs.com','mlkj', 1);