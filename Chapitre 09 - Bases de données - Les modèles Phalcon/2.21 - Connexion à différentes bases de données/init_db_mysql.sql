USE phalcon;

CREATE TABLE `phalcon`.`utilisateurs` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(100) NULL , `prenom` VARCHAR(100) NULL , `email` VARCHAR(100) NOT NULL , `mot_de_passe` VARCHAR(100) NOT NULL ,`fonction` VARCHAR(100) NOT NULL, `salaire` FLOAT, PRIMARY KEY (`id`)) ENGINE = MyISAM;

CREATE TABLE `phalcon`.`ville` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `nom` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;