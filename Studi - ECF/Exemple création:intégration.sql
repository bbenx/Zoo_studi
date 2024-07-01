-- Voici un exemple de schéma de création de table et d'intégration de données

-- Création de la table `etablissement`
CREATE TABLE `etablissement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

-- Insertion d'un enregistrement dans la table `etablissement`
INSERT INTO `etablissement` VALUES (NULL, 'Zoo Arcadia', 'Le Zoo Arcadia est un lieu de conservation et de protection des espèces.', NOW(), NOW());

-- Création de la table `habitats`
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
);

-- Insertion d'un enregistrement dans la table `habitats`
INSERT INTO `habitats` VALUES (NULL, 1, 'Savane Africaine', 'La savane abrite de nombreux animaux emblématiques d’Afrique.', 'https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_habitats/savane_africaine.webp', '2024-06-17 17:05:50', NOW());

-- Création de la table `espece_animaux`
CREATE TABLE `espece_animaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Insertion d'un enregistrement dans la table `espece_animaux`
INSERT INTO `espece_animaux` VALUES (NULL, 'Bisons', 'https://my-zoo-images.s3.eu-north-1.amazonaws.com/Images_especes/Bisons.webp');

-- Création de la table `users`
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
);
-- Insertion d'un enregistrement dans la table `users`
INSERT INTO `users` VALUES (NULL, 1, '[\"ROLE_ADMIN\"]', 'admin@example.com', '$2y$10$saltsaltsaltsaltplaintextpassword', '2024-06-17 17:05:50', NOW());

-- Création de la table `animaux`
CREATE TABLE `animaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `habitat_id` int NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modification_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9ABE194DAFFE2D26` (`habitat_id`),
  CONSTRAINT `FK_9ABE194DAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`)
);

-- Insertion d'un enregistrement dans la table `animaux`
INSERT INTO `animaux` VALUES (NULL, 1, 'Bebou', 'Girafe', 'https://my-zoo-images.s3.eu-north-1.amazonaws.com/Img_Animaux/Savane+Africaine/Girafes/Bebou.webp', NOW(), NOW());

-- Création de la table `avis`
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
);

-- Insertion d'un enregistrement dans la table `avis`
INSERT INTO `avis` VALUES ((UUID_TO_BIN(UUID())), 1, 'Visiteur1', 'Très beau zoo', NOW(), NOW(), 'validé', 0);

-- Création de la table `commentaires_habitats`
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
);

-- Insertion d'un enregistrement dans la table `commentaires_habitats`
INSERT INTO `commentaires_habitats` VALUES (NULL, 1, 1, 'Qui veritatis inventore aut assumenda harum.', 'repellat', 'Accusamus enim voluptatibus odit tempora sed ipsam.', NOW(), NOW());

-- Création de la table `comptes_rendus`
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
);

INSERT INTO `comptes_rendus` VALUES (NULL, 1, 1, 'Bon', 'L''animal est en bonne santé.', 'Herbe', 500, NOW(), NOW(), NOW());

-- Création de la table `contact` 
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

-- Insertion d'un enregistrement dans la table `contact`
INSERT INTO `contact` VALUES (NULL, 'colas.susanne@hotmail.fr', 'Demande n°1', 'Id sed dolorem rerum omnis. Veritatis est accusamus hic ut. Sed quam necessitatibus qui sunt soluta. Et facilis porro doloremque doloremque.', NOW());

-- Création de la table `horaires`
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
);

-- Insertion d'un enregistrement dans la table `horaires`
INSERT INTO `horaires` VALUES (NULL, 1, '09:00-18:00', '09:00-18:00', '09:00-18:00', '09:00-18:00', '09:00-18:00', '09:00-18:00', '09:00-18:00', NOW(), NOW());

-- Création de la table `nourriture`
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
);

-- Insertion d'un enregistrement dans la table `nourriture`
INSERT INTO `nourriture` VALUES (NULL, 1, 1, 'doloremque', 19, NOW(), NOW(), NOW());

-- Création de la table `reset_password_request`
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
);

-- Création de la table `services`
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
);

-- Insertion d'un enregistrement dans la table `services`
INSERT INTO `services` VALUES (NULL, 1, 'Restauration', 'Venez manger !', NOW(), NOW());
