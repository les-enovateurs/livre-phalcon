-- creation de la table entreprise
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

-- creation de la table informations_legales
CREATE TABLE informations_legales
(
    entreprises_id  bigint  NOT NULL REFERENCES entreprises (id),
    siret           varchar NOT NULL,
    nombre_employes bigint  NULL,
    CONSTRAINT informations_legales_pk PRIMARY KEY (entreprises_id)
);

-- insertion des données
INSERT INTO informations_legales (entreprises_id, siret, nombre_employes
)
VALUES (1, '404 833 048 00022', 10),
       (2, '404 833 048 00001', 20),
       (3, '404 833 048 00011', 2);

-- creation de la table utilisateurs
CREATE TABLE utilisateurs
(
    id             bigserial NOT NULL,
    nom            varchar   NULL,
    prenom         varchar   NULL,
    email          varchar   NOT NULL,
    mot_de_passe   varchar   NOT NULL,
    fonction       varchar   NOT NULL,
    entreprises_id bigint    NOT NULL REFERENCES entreprises (id) on update cascade on delete set null,
    CONSTRAINT utilisateurs_pk PRIMARY KEY (id),
    CONSTRAINT utilisateurs_un UNIQUE (email)
);

-- insertion des données
INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, fonction, entreprises_id
)
VALUES ('DOE', 'John', 'john.doe@les-enovateurs.com', 'azerty', 'stagiaire', 1)
     , ('DOE', 'Louise', 'louise.doe@les-enovateurs.com', 'uiopq', 'cadre', 1)
     , ('DOE', 'Sébastien', 'sebastien.doe@les-enovateurs.com', 'kj', 'CEO', 1)
     , ('DOE', 'Damien', 'damien.doe@graphivox.com', 'lmwx', 'cadre', 2)
     , ('DOE', 'Benoit', 'benoit.doe@graphivox.com', 'lmwx', 'cadre', 2)
     , ('DOE', 'Camille', 'camille.doe@graphivox.com', 'ghjk', 'CTO', 2)
     , ('DOE', 'Sandrine', 'sandrine.doe@graphivox.com', 'bb', 'responsable', 2)
     , ('DOE', 'Philippe', 'philippe.doe@graphivox.com', 'kklj', 'responsable', 2)
     , ('DOE', 'Jacky', 'jacky.doe@test.com', 'kklj', 'responsable', 3);


-- creation de la table produits
CREATE TABLE produits
(
    id   bigserial        NOT NULL,
    nom  varchar          NOT NULL,
    prix double precision NOT NULL,
    CONSTRAINT produits_pk PRIMARY KEY (id)
);

-- insertion des données
INSERT INTO produits (nom, prix
)
VALUES ('Livre Phalcon', 49.99),
       ('Formation PHP', 7.2),
       ('DVD Ubuntu', 18.04);


-- creation de la table utilisateurs_achats_produits
CREATE TABLE utilisateurs_achats_produits
(
    id              bigserial NOT NULL,
    utilisateurs_id bigint    NOT NULL REFERENCES utilisateurs (id),
    produits_id     bigint    NOT NULL REFERENCES produits (id),
    quantite        int       NOT NULL,
    CONSTRAINT utilisateurs_achats_produits_pk PRIMARY KEY (id)
);

-- insertion des données
INSERT INTO utilisateurs_achats_produits (utilisateurs_id, produits_id, quantite
)
VALUES (1, 1, 200),
       (1, 2, 1),
       (2, 3, 10),
       (5, 2, 2),
       (4, 1, 100),
       (9, 1, 22);

-- ajout d'une vue
CREATE VIEW utilisateurs_crypte AS
    SELECT md5(nom) as nom, md5(prenom) as prenom
    FROM utilisateurs;