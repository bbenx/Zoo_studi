<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515184708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires CHANGE mardi mardi VARCHAR(255) NOT NULL, CHANGE mercredi mercredi VARCHAR(255) NOT NULL, CHANGE jeudi jeudi VARCHAR(255) NOT NULL, CHANGE vendredi vendredi VARCHAR(255) NOT NULL, CHANGE samedi samedi VARCHAR(255) NOT NULL, CHANGE dimanche dimanche VARCHAR(255) NOT NULL, CHANGE creation_date creation_date VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaires CHANGE mardi mardi TIME NOT NULL, CHANGE mercredi mercredi TIME NOT NULL, CHANGE jeudi jeudi TIME NOT NULL, CHANGE vendredi vendredi TIME NOT NULL, CHANGE samedi samedi TIME NOT NULL, CHANGE dimanche dimanche TIME NOT NULL, CHANGE creation_date creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
