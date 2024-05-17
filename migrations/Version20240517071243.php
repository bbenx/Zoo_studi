<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517071243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nourriture_animaux (nourriture_id INT NOT NULL, animaux_id INT NOT NULL, INDEX IDX_62BD210E98BD5834 (nourriture_id), INDEX IDX_62BD210EA9DAECAA (animaux_id), PRIMARY KEY(nourriture_id, animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nourriture_animaux ADD CONSTRAINT FK_62BD210E98BD5834 FOREIGN KEY (nourriture_id) REFERENCES nourriture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nourriture_animaux ADD CONSTRAINT FK_62BD210EA9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nourriture DROP FOREIGN KEY FK_7447E6138E962C16');
        $this->addSql('DROP INDEX IDX_7447E6138E962C16 ON nourriture');
        $this->addSql('ALTER TABLE nourriture ADD quantite INT NOT NULL, DROP animal_id, DROP quantité, CHANGE creation_date creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nourriture_animaux DROP FOREIGN KEY FK_62BD210E98BD5834');
        $this->addSql('ALTER TABLE nourriture_animaux DROP FOREIGN KEY FK_62BD210EA9DAECAA');
        $this->addSql('DROP TABLE nourriture_animaux');
        $this->addSql('ALTER TABLE nourriture ADD quantité INT NOT NULL, CHANGE creation_date creation_date DATETIME NOT NULL, CHANGE quantite animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE nourriture ADD CONSTRAINT FK_7447E6138E962C16 FOREIGN KEY (animal_id) REFERENCES animaux (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7447E6138E962C16 ON nourriture (animal_id)');
    }
}
