<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240610162356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animaux (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, prenom VARCHAR(255) NOT NULL, race VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_9ABE194DAFFE2D26 (habitat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', etablissement_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, valide TINYINT(1) NOT NULL, INDEX IDX_8F91ABF0FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires_habitats (id INT AUTO_INCREMENT NOT NULL, habitat_id INT DEFAULT NULL, user_id INT NOT NULL, avis LONGTEXT NOT NULL, etat VARCHAR(255) NOT NULL, amelioration VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_41D2BBFAAFFE2D26 (habitat_id), INDEX IDX_41D2BBFAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptes_rendus (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, user_id INT NOT NULL, etat_animal VARCHAR(255) NOT NULL, detail_etat LONGTEXT DEFAULT NULL, type_nourriture VARCHAR(255) NOT NULL, grammage_nourriture INT NOT NULL, date_passage DATETIME NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_461417618E962C16 (animal_id), INDEX IDX_46141761A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, subject VARCHAR(100) DEFAULT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece_animaux (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitats (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_B5E492F3FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, id_etablissement_id INT NOT NULL, lundi VARCHAR(255) NOT NULL, mardi VARCHAR(255) NOT NULL, mercredi VARCHAR(255) NOT NULL, jeudi VARCHAR(255) NOT NULL, vendredi VARCHAR(255) NOT NULL, samedi VARCHAR(255) NOT NULL, dimanche VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_39B7118F1CE947F9 (id_etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, lien LONGBLOB NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nourriture (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) NOT NULL, quantite INT NOT NULL, date_passage DATETIME NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_modification DATETIME NOT NULL, INDEX IDX_7447E6138E962C16 (animal_id), INDEX IDX_7447E613A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_7332E169FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, roles JSON NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', modification_date DATETIME NOT NULL, INDEX IDX_1483A5E9FF631228 (etablissement_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animaux ADD CONSTRAINT FK_9ABE194DAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitats (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE commentaires_habitats ADD CONSTRAINT FK_41D2BBFAAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitats (id)');
        $this->addSql('ALTER TABLE commentaires_habitats ADD CONSTRAINT FK_41D2BBFAA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comptes_rendus ADD CONSTRAINT FK_461417618E962C16 FOREIGN KEY (animal_id) REFERENCES animaux (id)');
        $this->addSql('ALTER TABLE comptes_rendus ADD CONSTRAINT FK_46141761A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE habitats ADD CONSTRAINT FK_B5E492F3FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE horaires ADD CONSTRAINT FK_39B7118F1CE947F9 FOREIGN KEY (id_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E6138E962C16 FOREIGN KEY (animal_id) REFERENCES animaux (id)');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E613A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux DROP FOREIGN KEY FK_9ABE194DAFFE2D26');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FF631228');
        $this->addSql('ALTER TABLE commentaires_habitats DROP FOREIGN KEY FK_41D2BBFAAFFE2D26');
        $this->addSql('ALTER TABLE commentaires_habitats DROP FOREIGN KEY FK_41D2BBFAA76ED395');
        $this->addSql('ALTER TABLE comptes_rendus DROP FOREIGN KEY FK_461417618E962C16');
        $this->addSql('ALTER TABLE comptes_rendus DROP FOREIGN KEY FK_46141761A76ED395');
        $this->addSql('ALTER TABLE habitats DROP FOREIGN KEY FK_B5E492F3FF631228');
        $this->addSql('ALTER TABLE horaires DROP FOREIGN KEY FK_39B7118F1CE947F9');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E6138E962C16');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E613A76ED395');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169FF631228');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9FF631228');
        $this->addSql('DROP TABLE animaux');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE commentaires_habitats');
        $this->addSql('DROP TABLE comptes_rendus');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE espece_animaux');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE habitats');
        $this->addSql('DROP TABLE horaires');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE nourriture');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
