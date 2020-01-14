CREATE TABLE entreprises
(
    id  bigserial NOT NULL,
    nom varchar   NOT NULL,
    CONSTRAINT entreprises_pk PRIMARY KEY (id)
);

-- insertion des données
INSERT INTO entreprises (nom
)
VALUES ('Les Enovateurs'),
       ('Graphivox'),
       ('Test');
	   
-- creation de la table utilisateurs
CREATE TABLE utilisateurs
(
    id             bigserial NOT NULL,
    nom            varchar   NULL,
    prenom         varchar   NULL,
    email          varchar   NOT NULL,
    mot_de_passe   varchar   NOT NULL,
    fonction       varchar   NOT NULL,
    entreprises_id bigint    NOT NULL REFERENCES entreprises (id),
    CONSTRAINT utilisateurs_pk PRIMARY KEY (id),
    CONSTRAINT utilisateurs_un UNIQUE (email)
);

-- insertion des données
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, fonction, entreprises_id
)
VALUES ('DOE', 'John', 'john.doe@les-enovateurs.com', 'azerty', 'stagiaire', 3)
     , ('DOE', 'Louise', 'louise.doe@les-enovateurs.com', 'uiopq', 'cadre', 1)
     , ('DOE', 'Sébastien', 'sebastien.doe@les-enovateurs.com', 'kj', 'CEO', 1)
     , ('DOE', 'Damien', 'damien.doe@graphivox.com', 'lmwx', 'cadre', 2)
     , ('DOE', 'Benoit', 'benoit.doe@graphivox.com', 'lmwx', 'cadre', 2)
     , ('DOE', 'Camille', 'camille.doe@graphivox.com', 'ghjk', 'CTO', 2)
     , ('DOE', 'Sandrine', 'sandrine.doe@graphivox.com', 'bb', 'responsable', 2)
     , ('DOE', 'Philippe', 'philippe.doe@graphivox.com', 'kklj', 'responsable', 2)
     , ('DOE', 'Jacky', 'jacky.doe@test.com', 'kklj', 'responsable', 3);