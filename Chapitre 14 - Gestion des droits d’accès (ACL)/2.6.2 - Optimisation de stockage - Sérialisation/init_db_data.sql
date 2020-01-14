-- creation de la table utilisateurs
CREATE TABLE utilisateurs (
	id bigserial NOT NULL,
	nom varchar NULL,
	prenom varchar NULL,
	email varchar NOT NULL,
	mot_de_passe varchar NOT NULL,
	nom_role varchar NOT NULL,
	CONSTRAINT utilisateurs_pk PRIMARY KEY (id),
	CONSTRAINT utilisateurs_un UNIQUE (email)
);

-- insertion des données
INSERT INTO utilisateurs (nom,prenom,email,mot_de_passe, nom_role) VALUES
('DOE','John','john.doe@les-enovateurs.com','azerty', 'vendeurs')
,('DOE','Louise','louise.doe@les-enovateurs.com','uiopq', 'clients')
,('DOE','Sébastien','sebastien.doe@les-enovateurs.com','qsdf', 'clients')
,('DOE','Camille','camille.doe@les-enovateurs.com','ghjk', 'vendeurs')
,('DOE','Damien','damien.doe@les-enovateurs.com','lmwx', 'vendeurs')
,('DOE','Sandrine','sandrine.doe@les-enovateurs.com','cvbn', 'clients')
,('DOE','Philippe','philippe.doe@les-enovateurs.com','mlkj', 'vendeurs');