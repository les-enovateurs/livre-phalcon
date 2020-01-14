-- creation de la table utilisateurs
CREATE TABLE utilisateurs (
	id bigserial NOT NULL,
	nom varchar NULL,
	prenom varchar NULL,
	email varchar NOT NULL,
	mot_de_passe varchar NOT NULL,
	CONSTRAINT utilisateurs_pk PRIMARY KEY (id)
);

-- insertion des données
INSERT INTO utilisateurs (nom,prenom,email,mot_de_passe) VALUES 
('DOE','John','john.doe@les-enovateurs.com','azerty')
,('DOE','Louise','louise.doe@les-enovateurs.com','uiopq')
,('DOE','Sébastien','sebastien.doe@les-enovateurs.com','qsdf')
,('DOE','Camille','camille.doe@les-enovateurs.com','ghjk')
,('DOE','Damien','damien.doe@les-enovateurs.com','lmwx')
,('DOE','Sandrine','sandrine.doe@les-enovateurs.com','cvbn')
,('DOE','Philippe','philippe.doe@les-enovateurs.com','mlkj');