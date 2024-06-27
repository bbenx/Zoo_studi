-- Voici un exemple de schéma de création de table et d'intégration de données

-- Création de la table `animaux`
-- Cette table stocke les informations sur les animaux du zoo.
-- Chaque animal est associé à un habitat spécifique et contient des détails comme le prénom, la race, et une image.

CREATE TABLE `animaux` (
  `id` int NOT NULL AUTO_INCREMENT, -- Identifiant unique de l'animal
  `habitat_id` int NOT NULL, -- Identifiant de l'habitat associé
  `prenom` varchar(255) NOT NULL, -- Prénom de l'animal
  `race` varchar(255) NOT NULL, -- Race de l'animal
  `image` varchar(255) NOT NULL, -- URL de l'image de l'animal
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)', -- Date et heure de création
  `modification_date` datetime NOT NULL, -- Date et heure de la dernière modification
  PRIMARY KEY (`id`), -- Clé primaire sur le champ `id`
  KEY `IDX_9ABE194DAFFE2D26` (`habitat_id`), -- Index sur le champ `habitat_id` pour optimiser les recherches
  CONSTRAINT `FK_9ABE194DAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) -- Clé étrangère référencée à la table `habitats`
);


CREATE TABLE `avis` (
  `id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `etablissement_id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` longtext NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  `statut` varchar(255) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF0FF631228` (`etablissement_id`),
  CONSTRAINT `FK_8F91ABF0FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`)
) 


CREATE TABLE `commentaires_habitats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `habitat_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `avis` longtext NOT NULL,
  `etat` varchar(255) NOT NULL,
  `amelioration` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_41D2BBFAAFFE2D26` (`habitat_id`),
  KEY `IDX_41D2BBFAA76ED395` (`user_id`),
  CONSTRAINT `FK_41D2BBFAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_41D2BBFAAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`)
) 


CREATE TABLE `comptes_rendus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `user_id` int NOT NULL,
  `etat_animal` varchar(255) NOT NULL,
  `detail_etat` longtext,
  `type_nourriture` varchar(255) NOT NULL,
  `grammage_nourriture` int NOT NULL,
  `date_passage` datetime NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_461417618E962C16` (`animal_id`),
  KEY `IDX_46141761A76ED395` (`user_id`),
  CONSTRAINT `FK_461417618E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animaux` (`id`),
  CONSTRAINT `FK_46141761A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) 


CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 


CREATE TABLE `espece_animaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) 


CREATE TABLE `etablissement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 


CREATE TABLE `habitats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etablissement_id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B5E492F3FF631228` (`etablissement_id`),
  CONSTRAINT `FK_B5E492F3FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`)
)


CREATE TABLE `horaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_etablissement_id` int NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `samedi` varchar(255) NOT NULL,
  `dimanche` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_39B7118F1CE947F9` (`id_etablissement_id`),
  CONSTRAINT `FK_39B7118F1CE947F9` FOREIGN KEY (`id_etablissement_id`) REFERENCES `etablissement` (`id`)
) 


CREATE TABLE `nourriture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `user_id` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantite` int NOT NULL,
  `date_passage` datetime NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7447E6138E962C16` (`animal_id`),
  KEY `IDX_7447E613A76ED395` (`user_id`),
  CONSTRAINT `FK_7447E6138E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animaux` (`id`),
  CONSTRAINT `FK_7447E613A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) 


CREATE TABLE `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) NOT NULL,
  `hashed_token` varchar(100) NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
)


CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etablissement_id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7332E169FF631228` (`etablissement_id`),
  CONSTRAINT `FK_7332E169FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`)
)


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etablissement_id` int NOT NULL,
  `roles` json NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`),
  KEY `IDX_1483A5E9FF631228` (`etablissement_id`),
  CONSTRAINT `FK_1483A5E9FF631228` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissement` (`id`)
)


-- Insertion d'une ligne d'exemple dans la table `animaux`
-- Cette insertion sert d'exemple pour montrer comment ajouter un nouvel animal dans la base de données.
-- Notez que les valeurs sont des exemples et doivent être ajustées selon les besoins réels.

INSERT INTO `animaux` VALUES (127,11,'Bebou','Girafe','https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Bebou.webp','2024-06-17 17:05:50','2024-06-17 17:05:50');






INSERT INTO `commentaires_habitats` VALUES (201,17,60,'Qui veritatis inventore aut assumenda harum.','repellat','Accusamus enim voluptatibus odit tempora sed ipsam.','2024-06-17 17:05:50','2024-06-17 17:05:50');

INSERT INTO `contact` VALUES (59,'colas.susanne@hotmail.fr','Demande n°1','Id sed dolorem rerum omnis. Veritatis est accusamus hic ut. Sed quam necessitatibus qui sunt soluta. Et facilis porro doloremque doloremque.','2024-06-17 17:05:37');

INSERT INTO `espece_animaux` VALUES (9,'Bisons','https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Bisons.webp');

INSERT INTO `habitats` VALUES (10,2,'Désert du Sahara','Plongez dans les paysages arides et mystérieux du désert du Sahara. Apprenez comment les animaux survivent dans cet environnement extrême, entre dunes et oasis.','https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/desert_sahara.webp','2024-06-17 17:05:37','2024-06-17 17:05:37');

INSERT INTO `nourriture` VALUES (201,139,60,'doloremque',19,'2024-06-17 17:05:50','2024-06-17 17:05:50','2024-06-17 17:05:50');

INSERT INTO `service` VALUES (1, 'Restauration', 'Venez manger !');
