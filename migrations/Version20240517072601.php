<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517072601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes_rendus DROP INDEX IDX_461417618E962C16, ADD UNIQUE INDEX UNIQ_461417618E962C16 (animal_id)');
        $this->addSql('ALTER TABLE comptes_rendus CHANGE creation_date creation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes_rendus DROP INDEX UNIQ_461417618E962C16, ADD INDEX IDX_461417618E962C16 (animal_id)');
        $this->addSql('ALTER TABLE comptes_rendus CHANGE creation_date creation_date DATETIME NOT NULL');
    }
}
