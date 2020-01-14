CREATE TABLE utilisateurs
(
    id             bigserial NOT NULL,
    nom            varchar   NULL,
    prenom         varchar   NULL,
    email          varchar   NOT NULL,
    mot_de_passe   varchar   NOT NULL,
    fonction       varchar   NOT NULL,
    salaire        float,
    CONSTRAINT utilisateurs_pk PRIMARY KEY (id),
    CONSTRAINT utilisateurs_un UNIQUE (email)
);

-- insertion des données
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, fonction, salaire)
VALUES ('DOE', 'John', 'john.doe@les-enovateurs.com', 'azerty', 'stagiaire', 600)
     , ('DOE', 'Louise', 'louise.doe@les-enovateurs.com', 'uiopq', 'cadre', 1500)
     , ('DOE', 'Sébastien', 'sebastien.doe@les-enovateurs.com', 'kj', 'CEO', 2500)
     , ('DOE', 'Damien', 'damien.doe@graphivox.com', 'lmwx', 'cadre', 1500)
     , ('DOE', 'Benoit', 'benoit.doe@graphivox.com', 'lmwx', 'cadre', 1500)
     , ('DOE', 'Camille', 'camille.doe@graphivox.com', 'ghjk', 'CTO', 2000)
     , ('DOE', 'Sandrine', 'sandrine.doe@graphivox.com', 'bb', 'responsable', 1800)
     , ('DOE', 'Philippe', 'philippe.doe@graphivox.com', 'kklj', 'responsable', 1800)
     , ('DOE', 'Jacky', 'jacky.doe@test.com', 'kklj', 'responsable', 1800);